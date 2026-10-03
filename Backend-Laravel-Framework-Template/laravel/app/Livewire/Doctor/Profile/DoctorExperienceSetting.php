<?php

namespace App\Livewire\Doctor\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\DoctorExperience;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class DoctorExperienceSetting extends Component
{
    use WithFileUploads;

    public $experiences = [];
    public $doctor;
    public $deletedExperienceIds = [];

    public function mount()
    {
        $this->doctor = Auth::user();
        $this->experiences = $this->doctor->doctorExperiences()->get()->map(function ($exp) {
            return [
                'id' => $exp->id,
                'hospital_name' => $exp->hospital_name,
                'year_of_experience' => $exp->year_of_experience,
                'location' => $exp->location,
                'specialities' => $exp->specialities,
                'description' => $exp->description,
                'start_time' => $exp->start_time ? $exp->start_time->format('Y-m-d') : '',
                'end_time' => $exp->end_time ? $exp->end_time->format('Y-m-d') : '',
                'hospital_image_url' => $exp->hospital_image_url,
                'hospital_image' => null
            ];
        })->toArray();
    }

    public function addExperience()
    {
        $this->experiences[] = [
            'id' => null,
            'hospital_name' => '',
            'year_of_experience' => '',
            'location' => '',
            'specialities' => '',
            'description' => '',
            'start_time' => '',
            'end_time' => '',
            'hospital_image' => null,
            'hospital_image_url' => null
        ];
    }

    public function removeExperience($index)
    {
        if (isset($this->experiences[$index]['id'])) {
            $this->deletedExperienceIds[] = $this->experiences[$index]['id'];
        }
        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);
    }

    public function saveExperiences()
    {
        // Xóa các experience đã đánh dấu để xóa
        if (!empty($this->deletedExperienceIds)) {
            DoctorExperience::whereIn('id', $this->deletedExperienceIds)->delete();
            $this->deletedExperienceIds = [];
        }

        foreach ($this->experiences as $index => $experience) {
            $data = [
                'doctor_id' => $this->doctor->id,
                'hospital_name' => $experience['hospital_name'],
                'year_of_experience' => $experience['year_of_experience'],
                'location' => $experience['location'],
                'specialities' => $experience['specialities'],
                'description' => $experience['description'],
                'start_time' => $experience['start_time'],
                'end_time' => $experience['end_time'],
            ];

            // Xử lý upload ảnh bệnh viện
            if (isset($experience['hospital_image']) && is_object($experience['hospital_image'])) {
                $fileName = 'hospital_' . uniqid() . '.webp';
                $manager = new ImageManager(new Driver());
                $binaryData = file_get_contents($experience['hospital_image']->getRealPath());
                $image = $manager->read($binaryData);
                $image->scale(width: 1920);
                $encoded = $image->toWebp(70);
                Storage::put('public/Hospital/' . $fileName, $encoded);
                $data['hospital_image_url'] = $fileName;
            }

            DoctorExperience::updateOrCreate(
                ['id' => $experience['id'] ?? null],
                $data
            );
        }

        session()->flash('success', 'Experiences updated successfully!');
    }

    public function render()
    {
        return view('livewire.doctor.profile.doctor-experience-setting');
    }
}
