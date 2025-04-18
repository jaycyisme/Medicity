<?php

namespace App\Livewire\Doctor\Profile;

use App\Models\Service;
use Livewire\Component;
use App\Models\DoctorService;
use App\Models\DoctorTest;
use App\Models\LaboratoryTest;
use Illuminate\Support\Facades\Auth;

class DoctorEducationSetting extends Component
{
    public $services = [];
    public $selectedServices = [];

    public $tests = [];
    public $selectedTests = [];

    public function mount()
    {
        $this->services = Service::all();
        $this->selectedServices = DoctorService::where('doctor_id', Auth::id())
            ->pluck('service_id')
            ->toArray();

        $this->tests = LaboratoryTest::all();
        $this->selectedTests = DoctorTest::where('doctor_id', Auth::id())
            ->pluck('test_id')
            ->toArray();
    }

    public function toggleService($serviceId)
    {
        if (in_array($serviceId, $this->selectedServices)) {
            DoctorService::where('doctor_id', Auth::id())
                ->where('service_id', $serviceId)
                ->delete();
        } else {
            DoctorService::create([
                'doctor_id' => Auth::id(),
                'service_id' => $serviceId,
            ]);
        }

        $this->selectedServices = DoctorService::where('doctor_id', Auth::id())
            ->pluck('service_id')
            ->toArray();
    }

    public function toggleTest($testId)
    {
        if (in_array($testId, $this->selectedTests)) {
            DoctorTest::where('doctor_id', Auth::id())
                ->where('test_id', $testId)
                ->delete();
        } else {
            DoctorTest::create([
                'doctor_id' => Auth::id(),
                'test_id' => $testId,
            ]);
        }

        $this->selectedTests = DoctorTest::where('doctor_id', Auth::id())
            ->pluck('test_id')
            ->toArray();
    }


    public function render()
    {
        return view('livewire.doctor.profile.doctor-education-setting');
    }
}
