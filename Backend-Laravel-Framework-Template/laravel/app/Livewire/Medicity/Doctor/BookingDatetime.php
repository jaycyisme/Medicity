<?php

namespace App\Livewire\Medicity\Doctor;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;

class BookingDatetime extends Component
{
    public $appointment;
    public $doctor;
    public $date;
    public $time;
    public $timeSlots = [];
    public $selectedServiceDuration;
    public $disabledSlots = [];

    public function mount($id)
    {
        $this->appointment = Appointment::findOrFail($id);
        $this->doctor = $this->appointment->doctor;
        $this->selectedServiceDuration = $this->appointment->service->duration ?? 30;
    }

    public function handleUpdatedDate($value)
    {
        $this->generateTimeSlots($value);
    }

    private function generateTimeSlots($selectedDate)
    {
        // Lấy ngày trong tuần từ selectedDate
        $dayOfWeek = Carbon::parse($selectedDate)->format('l');  // "Monday", "Tuesday", ...
        $businessHours = json_decode($this->doctor->business_hours, true);

        // Kiểm tra xem bác sĩ có giờ làm việc cho ngày đó không
        if (!isset($businessHours[$dayOfWeek]) || !$businessHours[$dayOfWeek]['start']) {
            $this->timeSlots = [];
            $this->disabledSlots = [];
            return;
        }

        // Tạo đối tượng Carbon cho giờ bắt đầu và kết thúc
        $start = Carbon::createFromFormat('H:i', $businessHours[$dayOfWeek]['start']);
        $end = Carbon::createFromFormat('H:i', $businessHours[$dayOfWeek]['end']);
        $duration = $this->selectedServiceDuration;  // Thời gian của mỗi dịch vụ (ví dụ: 30 phút)

        // Lấy ngày đã chọn và chuyển đổi định dạng
        $formattedSelectedDate = Carbon::parse($selectedDate)->format('Y-m-d');

        // Lấy tất cả các cuộc hẹn của bác sĩ
        $bookedAppointments = Appointment::where('doctor_id', $this->doctor->id)
            ->get();  // Lấy tất cả các cuộc hẹn của bác sĩ (không lọc theo ngày)

        // Lọc các cuộc hẹn đã đặt vào ngày đã chọn
        $filteredAppointments = $bookedAppointments->filter(function ($appointment) use ($formattedSelectedDate) {
            // Chuyển đổi business_hour về mảng
            $appointmentData = json_decode($appointment->business_hour, true);

            // Kiểm tra nếu ngày trong business_hour trùng với ngày đã chọn
            return isset($appointmentData['date']) && $appointmentData['date'] === $formattedSelectedDate;
        });

        // Tạo các khoảng thời gian (time slots) cách nhau 1 giờ
        $allSlots = [];
        $disabledSlots = [];
        $currentSlot = clone $start;

        // Duyệt qua tất cả các khung giờ trong giờ làm việc của bác sĩ
        while ($currentSlot->lte($end)) {
            $slotEnd = (clone $currentSlot)->addHours(1);  // Mỗi khung giờ là 1 giờ
            $slotStartTime = $currentSlot->format('H:i');
            $slotEndTime = $slotEnd->format('H:i');

            // Kiểm tra nếu có 3 cuộc hẹn đã được đặt trong khung giờ này
            $appointmentsInSlot = $filteredAppointments->filter(function ($appointment) use ($slotStartTime, $slotEndTime) {
                $appointmentData = json_decode($appointment->business_hour, true);
                if (isset($appointmentData['time'])) {
                    $appointmentTime = Carbon::createFromFormat('H:i', $appointmentData['time']);
                    $appointmentEndTime = (clone $appointmentTime)->addMinutes($this->selectedServiceDuration);

                    // Kiểm tra xem cuộc hẹn có trùng với khung giờ này không
                    return $appointmentTime->gte($slotStartTime) && $appointmentEndTime->lte($slotEndTime);
                }
                return false;
            });

            // Nếu đã có 3 cuộc hẹn trong khung giờ này thì không thể chọn
            if ($appointmentsInSlot->count() >= 2) {
                $disabledSlots[] = $slotStartTime;  // Vô hiệu hóa slot nếu có 3 cuộc hẹn
            } else {
                $allSlots[] = $slotStartTime;  // Thêm slot vào danh sách các slot có thể chọn
            }

            // Di chuyển đến khung giờ tiếp theo
            $currentSlot->addHours(1);
        }

        // Gán danh sách thời gian cho các slot có thể chọn và đã bị vô hiệu hóa
        $this->timeSlots = $allSlots;
        $this->disabledSlots = $disabledSlots;
    }

    public function updateDateTime()
    {
        if (!$this->date || !$this->time) {
            return redirect()->route('appointment-date-time', ['id' => $this->appointment->id])
                ->with('error', 'Please select a date and time before proceeding.');
        }

        $this->appointment->update([
            'business_hour' => json_encode(['date' => $this->date, 'time' => $this->time]),
        ]);

        return redirect()->route('appointment-info', ['id' => $this->appointment->id]);
    }

    public function render()
    {
        return view('livewire.medicity.doctor.booking-datetime');
    }
}
