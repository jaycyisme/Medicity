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
        $dayOfWeek = Carbon::parse($selectedDate)->format('l');
        $businessHours = json_decode($this->doctor->business_hours, true);

        if (!isset($businessHours[$dayOfWeek]) || !$businessHours[$dayOfWeek]['start']) {
            $this->timeSlots = [];
            $this->disabledSlots = [];
            return;
        }

        $start = Carbon::createFromFormat('H:i', $businessHours[$dayOfWeek]['start']);
        $end = Carbon::createFromFormat('H:i', $businessHours[$dayOfWeek]['end']);
        $duration = $this->selectedServiceDuration;

        // Fetch all booked appointments for that doctor on the selected date
        $bookedAppointments = Appointment::where('doctor_id', $this->doctor->id)
            ->where('status_id', 1) // "Waiting" status
            ->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(business_hour, '$.date')) = ?", [$selectedDate])
            ->get();

        // Generate all possible time slots
        $allSlots = [];
        $disabledSlots = [];
        $currentSlot = clone $start;

        while ($currentSlot->lte($end)) {
            $slotEnd = (clone $currentSlot)->addMinutes($duration);
            $isAvailable = true;

            // Check if this time slot overlaps with any booked appointment
            foreach ($bookedAppointments as $appointment) {
                $appointmentData = json_decode($appointment->business_hour, true);
                if (isset($appointmentData['time'])) {
                    $bookedTime = Carbon::createFromFormat('H:i', $appointmentData['time']);
                    $bookedEndTime = (clone $bookedTime)->addMinutes($duration);

                    // Check for overlap
                    if ($currentSlot->lt($bookedEndTime) && $slotEnd->gt($bookedTime)) {
                        $isAvailable = false;
                        break;
                    }
                }
            }

            // Check if the current slot matches any booked time exactly
            foreach ($bookedAppointments as $appointment) {
                $appointmentData = json_decode($appointment->business_hour, true);
                if (isset($appointmentData['time']) && $currentSlot->format('H:i') === $appointmentData['time']) {
                    $isAvailable = false;
                    break;
                }
            }

            if ($isAvailable) {
                $allSlots[] = $currentSlot->format('H:i');
            } else {
                $disabledSlots[] = $currentSlot->format('H:i');
            }

            $currentSlot->addMinutes($duration);
        }

        $this->timeSlots = $allSlots;
        $this->disabledSlots = $disabledSlots;
    }

    public function updateDateTime()
    {
        if (!$this->date || !$this->time) {
            return redirect()->route('appointment-date-time', ['id' => $this->appointment->id])->with('error', 'Please select a date and time before proceeding.');
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
