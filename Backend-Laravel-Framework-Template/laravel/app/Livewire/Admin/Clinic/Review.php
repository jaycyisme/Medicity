<?php

namespace App\Livewire\Admin\Clinic;

use App\Models\Clinic;
use Livewire\Component;
use App\Models\PharmacyReview;

class Review extends Component
{
    public $clinics;
    public $selectedClinicId;
    public $reviews = [];

    public function mount()
    {
        $this->clinics = Clinic::all();
        if ($this->clinics->isNotEmpty()) {
            $this->selectedClinicId = $this->clinics->first()->id;
            $this->loadReviews();
        }
    }

    public function selectClinic($clinicId)
    {
        $this->selectedClinicId = $clinicId;
        $this->loadReviews();
    }

    public function loadReviews()
    {
        $this->reviews = PharmacyReview::where('pharmacy_id', $this->selectedClinicId)
            ->latest()
            ->get()
            ->toArray();
    }

    public function toggleActive($reviewId)
    {
        $review = PharmacyReview::find($reviewId);
        if ($review) {
            $review->is_active = !$review->is_active;
            $review->save();
            $this->loadReviews();
            session()->flash('success', 'Review status updated.');
        }
    }

    public function render()
    {
        return view('livewire.admin.clinic.review');
    }
}
