<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\ProductFeedback;
use Livewire\Component;

class Review extends Component
{
    public $products;
    public $selectedProductId;
    public $reviews = [];

    public function mount()
    {
        $this->products = Product::all();
        if ($this->products->isNotEmpty()) {
            $this->selectedProductId = $this->products->first()->id;
            $this->loadReviews();
        }
    }

    public function selectProduct($productId)
    {
        $this->selectedProductId = $productId;
        $this->loadReviews();
    }

    public function loadReviews()
    {
        $this->reviews = ProductFeedback::where('product_id', $this->selectedProductId)
            ->latest()
            ->get()
            ->toArray();
    }

    public function toggleActive($reviewId)
    {
        $review = ProductFeedback::find($reviewId);
        if ($review) {
            $review->is_active = !$review->is_active;
            $review->save();
            $this->loadReviews();
            session()->flash('success', 'Review status updated.');
        }
    }

    public function render()
    {
        return view('livewire.admin.product.review');
    }
}
