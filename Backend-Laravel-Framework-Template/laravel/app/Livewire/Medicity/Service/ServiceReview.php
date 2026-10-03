<?php

namespace App\Livewire\Medicity\Service;

use App\Models\ServiceFeedback;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ServiceReview extends Component
{
    public $serviceId;
    public $star, $title, $review;

    protected $rules = [
        'star' => 'required|integer|min:1|max:5',
        'title' => 'required|string|max:255',
        'review' => 'required|string|max:1000',
    ];

    public function submitReview()
    {
        $this->validate();

        ServiceFeedback::create([
            'service_id' => $this->serviceId,
            'user_id' => Auth::id(),
            'star' => $this->star,
            'title' => $this->title,
            'review' => $this->review,
            'is_active' => false,
        ]);

        session()->flash('success', 'Review submitted successfully.');
        $this->reset(['star', 'title', 'review']);
    }

    public function render()
    {
        return view('livewire.medicity.service.service-review');
    }
}
