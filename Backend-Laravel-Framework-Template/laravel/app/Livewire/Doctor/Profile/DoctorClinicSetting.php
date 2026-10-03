<?php

namespace App\Livewire\Doctor\Profile;

use App\Models\Clinic;
use Livewire\Component;
use App\Models\DoctorClinic;
use App\Models\DoctorSpeciality;
use App\Models\Speciality;
use Illuminate\Support\Facades\Auth;

class DoctorClinicSetting extends Component
{
    public $clinics = [];
    public $selectedClinics = [];

    public $specialities = [];
    public $selectedSpecialities = [];

    public function mount()
    {
        $this->clinics = Clinic::all();
        $this->selectedClinics = DoctorClinic::where('doctor_id', Auth::id())
            ->pluck('clinic_id')
            ->toArray();

        $this->specialities = Speciality::all();
        $this->selectedSpecialities = DoctorSpeciality::where('doctor_id', Auth::id())
            ->pluck('speciality_id')
            ->toArray();
    }

    public function toggleClinic($clinicId)
    {
        if (in_array($clinicId, $this->selectedClinics)) {
            DoctorClinic::where('doctor_id', Auth::id())
                ->where('clinic_id', $clinicId)
                ->delete();
        } else {
            DoctorClinic::create([
                'doctor_id' => Auth::id(),
                'clinic_id' => $clinicId,
            ]);
        }

        $this->selectedClinics = DoctorClinic::where('doctor_id', Auth::id())
            ->pluck('clinic_id')
            ->toArray();
    }

    public function toggleSpeciality($specialityId)
    {
        if (in_array($specialityId, $this->selectedSpecialities)) {
            DoctorSpeciality::where('doctor_id', Auth::id())
                ->where('speciality_id', $specialityId)
                ->delete();
        } else {
            DoctorSpeciality::create([
                'doctor_id' => Auth::id(),
                'speciality_id' => $specialityId,
            ]);
        }

        $this->selectedSpecialities = DoctorSpeciality::where('doctor_id', Auth::id())
            ->pluck('speciality_id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.doctor.profile.doctor-clinic-setting');
    }
}
