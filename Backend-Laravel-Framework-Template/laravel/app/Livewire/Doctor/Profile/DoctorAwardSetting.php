<?php

namespace App\Livewire\Doctor\Profile;

use Livewire\Component;
use App\Models\DoctorAward;
use Illuminate\Support\Facades\Auth;

class DoctorAwardSetting extends Component
{
    public $awards = [];
    public $newAward = [
        'name' => '',
        'year' => '',
        'description' => ''
    ];

    public $doctor;
    public $deletedAwardIds = [];

    public function mount()
    {
        $this->doctor = Auth::user();
        $this->awards = $this->doctor->doctorAwards()->get()->toArray();
    }

    public function addAward()
    {
        $this->awards[] = [
            'id' => null,
            'name' => '',
            'year' => '',
            'description' => ''
        ];
        $this->awards = array_values($this->awards);
    }

    public function removeAward($index)
    {
        if (isset($this->awards[$index]['id'])) {
            $this->deletedAwardIds[] = $this->awards[$index]['id'];
        }
        unset($this->awards[$index]);
        $this->awards = array_values($this->awards);
    }

    public function saveAwards()
    {
        // Xóa các awards đã bị đánh dấu
        if (!empty($this->deletedAwardIds)) {
            DoctorAward::whereIn('id', $this->deletedAwardIds)->delete();
            $this->deletedAwardIds = [];
        }

        foreach ($this->awards as $award) {
            DoctorAward::updateOrCreate(
                ['id' => $award['id'] ?? null],
                [
                    'doctor_id' => $this->doctor->id,
                    'name' => $award['name'],
                    'year' => $award['year'],
                    'description' => $award['description'],
                ]
            );
        }

        session()->flash('success', 'Awards updated successfully!');
    }
    public function render()
    {
        return view('livewire.doctor.profile.doctor-award-setting');
    }
}
