<?php

namespace App\Livewire\Doctor\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DoctorBusinessSetting extends Component
{
    public $business_hours = [];

    public function mount()
    {
        // Lấy business_hours từ user hiện tại, nếu không có thì khởi tạo mặc định
        $user = Auth::user();
        $this->business_hours = $user->business_hours ? json_decode($user->business_hours, true) : [
            'Monday' => ['start' => null, 'end' => null],
            'Tuesday' => ['start' => null, 'end' => null],
            'Wednesday' => ['start' => null, 'end' => null],
            'Thursday' => ['start' => null, 'end' => null],
            'Friday' => ['start' => null, 'end' => null],
            'Saturday' => ['start' => null, 'end' => null],
            'Sunday' => ['start' => null, 'end' => null],
        ];
    }

    public function updateBusinessHours()
    {
        $user = Auth::user();

        $this->validate([
            'business_hours' => 'array',
        ]);

        $user->update([
            'business_hours' => json_encode($this->business_hours),
        ]);

        session()->flash('success', 'Business hours updated successfully!');
    }

    public function render()
    {
        return view('livewire.doctor.profile.doctor-business-setting');
    }
}
