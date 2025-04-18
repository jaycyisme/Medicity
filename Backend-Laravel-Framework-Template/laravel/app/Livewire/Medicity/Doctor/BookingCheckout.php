<?php

namespace App\Livewire\Medicity\Doctor;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;

class BookingCheckout extends Component
{
    public $appointment;
    public $doctor;
    public $averageStars;
    public $formattedDateTime;


    public $qrCodeUrl;

    public function mount($id) {
        $this->appointment = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
            'speciality'
        ])->findOrFail($id);
        $this->doctor = $this->appointment->doctor;
        $this->averageStars = $this->doctor->doctorFeedbacks->avg('star') ?? 0;
        $this->formattedDateTime = $this->formatDateTime();


        $bankId = 'MB';
        $accountNo = '061030102003';
        $template = 'compact2';
        $amount = $this->appointment->appointment_final_price;
        $description = $this->appointment->appointment_code ?? 'no_code';
        $accountName = 'ĐỖ QUỐC TUẤN';

        $this->qrCodeUrl = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-{$template}.png?amount={$amount}&addInfo={$description}&accountName={$accountName}";
    }

    public function formatDateTime()
    {
        $businessHour = json_decode($this->appointment->business_hour, true);
        if (!$businessHour || !isset($businessHour['date']) || !isset($businessHour['time'])) {
            return 'Not Set';
        }

        $date = Carbon::parse($businessHour['date'])->format('d M, Y');
        $time = $businessHour['time'];

        return "{$date} at {$time}";
    }

    public function checkout() {
        $this->appointment->update([
            'status_id' => 5,
            'payment_method_id' => 2,
        ]);

        return redirect()->route('appointment-confirmation', ['id' => $this->appointment->id]);
    }

    public function render()
    {
        return view('livewire.medicity.doctor.booking-checkout');
    }
}
