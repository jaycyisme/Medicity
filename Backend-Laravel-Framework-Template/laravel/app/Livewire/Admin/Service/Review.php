<?php

namespace App\Livewire\Admin\Service;

use App\Models\Service;
use App\Models\ServiceFeedback;
use Livewire\Component;

class Review extends Component
{
    public $services;
    public $selectedServiceId;
    public $reviews = [];

    public function mount()
    {
        $this->services = Service::all();
        if ($this->services->isNotEmpty()) {
            $this->selectedServiceId = $this->services->first()->id;
            $this->loadReviews();
        }
    }

    public function selectService($serviceId)
    {
        $this->selectedServiceId = $serviceId;
        $this->loadReviews();
    }

    public function loadReviews()
    {
        $this->reviews = ServiceFeedback::where('service_id', $this->selectedServiceId)
            ->latest()
            ->get()
            ->toArray();
    }

    public function toggleActive($reviewId)
    {
        $review = ServiceFeedback::find($reviewId);
        if ($review) {
            $review->is_active = !$review->is_active;
            $review->save();
            $this->loadReviews();
            session()->flash('success', 'Review status updated.');
        }
    }

    public function render()
    {
        return view('livewire.admin.service.review');
    }
}
