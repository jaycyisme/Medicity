<?php

namespace App\Livewire\Medicity\Doctor;

use App\Models\User;
use App\Models\Clinic;
use App\Models\Service;
use Livewire\Component;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\DoctorClinic;
use App\Models\DoctorService;
use App\Models\DoctorSpeciality;
use Illuminate\Support\Facades\Auth;

class DoctorBooking extends Component
{
    public $doctor_id;
    public $doctor;
    public $appointment;
    public $averageStars;
    public $appointmentId;

    public $speciality;
    public $service;
    public $clinic;
    public $consultationType;



    public function mount($doctorId) {
        $this->doctor = User::with([
            'doctorClinics.clinic',
            'doctorFeedbacks',
            'appointments',
            'doctorExperiences',
            'doctorAwards',
            'doctorInsurances',
            'doctorSpecialities',
            'doctorServices',
            'doctorMemberships',
            'consultationType'
        ])->findOrFail($doctorId);

        $this->averageStars = $this->doctor->doctorFeedbacks->avg('star') ?? 0;

        $this->speciality = $this->doctor->doctorSpecialities->first()->speciality->id ?? null;
        $this->service = null;
        $this->clinic = null;
        $this->consultationType = $this->doctor->consultation_type_id;

    }

    public function handleSpecialityChange($value)
    {
        $this->speciality = $value;
    }

    public function handleServiceChange($value)
    {
        $this->service = $value;
    }

    public function handleClinicChange($value)
    {
        $this->clinic = $value;
    }

    public function createAppointment()
    {
        $this->validate([
            'speciality' => 'required',
            'service' => 'required',
            'clinic' => 'nullable',
            'consultationType' => 'required',
        ]);

        if (!$this->service) {
            return redirect()->route('doctor-booking', ['doctor' => $this->doctor->id])->with('error','Please select a service before proceeding!');
        }

        if ($this->doctor->consultationType->name === 'Offline' && !$this->clinic) {
            return redirect()->route('doctor-booking', ['doctor' => $this->doctor->id])->with('error','Please select a clinic for an offline consultation!');
        }

        $service = Service::findOrFail($this->service);

        $this->appointment = Appointment::create([
            'user_id' => Auth::user()->id,
            'doctor_id' => $this->doctor->id,
            'speciality_id' => $this->speciality,
            'service_id' => $this->service,
            'clinic_id' => $this->clinic,
            'type_id' => $this->consultationType,
            'status_id' => 6,
            'appointment_price' => $service->price,
            'appointment_final_price' => $service->price,
        ]);

        $this->appointment->appointment_code = 'MEDAPT' . str_pad(Appointment::max('id') + 1, 8, '0', STR_PAD_LEFT);
        $this->appointment->save();

        $this->appointmentId = $this->appointment->id;

        return redirect()->route('appointment-date-time', ['id' => $this->appointmentId]);
    }


    public function render()
    {
        return view('livewire.medicity.doctor.doctor-booking');
    }
}
