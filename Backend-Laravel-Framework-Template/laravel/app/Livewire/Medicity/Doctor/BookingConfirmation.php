<?php

namespace App\Livewire\Medicity\Doctor;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;

class BookingConfirmation extends Component
{
    public $appointment;
    public $doctor;
    public $formattedDateTime;

    public function mount($id) {
        $this->appointment = Appointment::with([
            'clinic',
            'user',
            'service',
            'appointmentRequestType',
            'speciality'
        ])->findOrFail($id);
        $this->doctor = $this->appointment->doctor;
        $this->formattedDateTime = $this->formatDateTime();
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

    public function render()
    {
        return view('livewire.medicity.doctor.booking-confirmation');
    }
}
