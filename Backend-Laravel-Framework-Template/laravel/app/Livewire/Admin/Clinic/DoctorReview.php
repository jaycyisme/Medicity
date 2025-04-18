<?php

namespace App\Livewire\Admin\Clinic;

use App\Models\DoctorFeedback;
use App\Models\User;
use Livewire\Component;

class DoctorReview extends Component
{
    public $doctors;
    public $selectedDoctorId;
    public $reviews = [];

    public function mount()
    {
        $this->doctors = User::role('Doctor')->get();
        if ($this->doctors->isNotEmpty()) {
            $this->selectedDoctorId = $this->doctors->first()->id;
            $this->loadReviews();
        }
    }

    public function selectDoctor($doctorId)
    {
        $this->selectedDoctorId = $doctorId;
        $this->loadReviews();
    }

    public function loadReviews()
    {
        $this->reviews = DoctorFeedback::where('doctor_id', $this->selectedDoctorId)
            ->latest()
            ->get()
            ->toArray();
    }

    public function toggleActive($reviewId)
    {
        $review = DoctorFeedback::find($reviewId);
        if ($review) {
            $review->is_active = !$review->is_active;
            $review->save();
            $this->loadReviews();
            session()->flash('success', 'Review status updated.');
        }
    }

    public function render()
    {
        return view('livewire.admin.clinic.doctor-review');
    }
}
