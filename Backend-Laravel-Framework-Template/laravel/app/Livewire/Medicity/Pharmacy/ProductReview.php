<?php

namespace App\Livewire\Medicity\Pharmacy;

use Livewire\Component;
use App\Models\ProductFeedback;
use Illuminate\Support\Facades\Auth;

class ProductReview extends Component
{
    public $productId;
    public $star, $title, $review;

    protected $rules = [
        'star' => 'required|integer|min:1|max:5',
        'title' => 'required|string|max:255',
        'review' => 'required|string|max:1000',
    ];

    public function submitReview()
    {
        $this->validate();

        ProductFeedback::create([
            'product_id' => $this->productId,
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
        return view('livewire.medicity.pharmacy.product-review');
    }
}
