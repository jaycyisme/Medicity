<?php

namespace App\Livewire\Doctor\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DoctorInsurance;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class DoctorInsuranceSetting extends Component
{
    use WithFileUploads;

    public $insurances = [];
    public $doctor;
    public $deletedInsuranceIds = [];

    public function mount()
    {
        $this->doctor = Auth::user();
        $this->insurances = $this->doctor->doctorInsurances()->get()->toArray();
    }

    public function addInsurance()
    {
        $this->insurances[] = [
            'id' => null,
            'name' => '',
            'image' => null,
            'image_url' => null
        ];
    }

    public function removeInsurance($index)
    {
        if (isset($this->insurances[$index]['id'])) {
            $this->deletedInsuranceIds[] = $this->insurances[$index]['id'];
        }
        unset($this->insurances[$index]);
        $this->insurances = array_values($this->insurances);
    }

    public function saveInsurances()
    {
        if (!empty($this->deletedInsuranceIds)) {
            DoctorInsurance::whereIn('id', $this->deletedInsuranceIds)->delete();
            $this->deletedInsuranceIds = [];
        }

        foreach ($this->insurances as $index => $insurance) {
            $data = [
                'doctor_id' => $this->doctor->id,
                'name' => $insurance['name'],
            ];

            if (isset($insurance['image']) && is_object($insurance['image'])) {
                $fileName = 'insurance_' . uniqid() . '.webp';
                $manager = new ImageManager(new Driver());
                $binaryData = file_get_contents($insurance['image']->getRealPath());
                $image = $manager->read($binaryData);
                // $image->scale(width: 1920);
                $encoded = $image->toWebp(80);
                Storage::put('public/Insurance/' . $fileName, $encoded);
                $data['image_url'] = 'Insurance/' . $fileName;
            } else {
                $data['image_url'] = $insurance['image_url'] ?? null;
            }

            DoctorInsurance::updateOrCreate(
                ['id' => $insurance['id'] ?? null],
                $data
            );
        }

        session()->flash('success', 'Insurances updated successfully!');
    }


    public function render()
    {
        return view('livewire.doctor.profile.doctor-insurance-setting');
    }
}
