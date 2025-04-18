<?php

namespace App\Livewire\Medicity\Doctor;

use Livewire\Component;
use App\Models\DoctorFeedback;
use Illuminate\Support\Facades\Auth;

class DoctorReview extends Component
{
    public $doctorId;
    public $star, $title, $review_detail;

    protected $rules = [
        'star' => 'required|integer|min:1|max:5',
        'title' => 'required|string|max:255',
        'review_detail' => 'required|string|max:1000',
    ];

    public function submitReview()
    {
        $this->validate();

        DoctorFeedback::create([
            'doctor_id' => $this->doctorId,
            'patient_id' => Auth::id(),
            'star' => $this->star,
            'title' => $this->title,
            'review_detail' => $this->review_detail,
            'is_active' => false,
        ]);

        session()->flash('success', 'Review submitted successfully.');
        $this->reset(['star', 'title', 'review_detail']);
    }

    public function render()
    {
        return view('livewire.medicity.doctor.doctor-review');
    }
}
