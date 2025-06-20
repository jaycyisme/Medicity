<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductImage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Storage;

class ProductTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    public $products_deleted;

    public function mount() {
        $this->products_deleted = Product::onlyTrashed()->get();
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        $this->products_deleted = Product::onlyTrashed()->get();
        return redirect()->route('product.index')->with('success', 'Product is deleted successfully');
    }

    public function restore($id) {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('product.index')->with('success', 'Product is restored successfully');
    }

    public function forceDelete($id) {
        $product = Product::withTrashed()->findOrFail($id);

        if ($product->thumbnail && Storage::exists('public/Product/' . $product->thumbnail)) {
            Storage::delete('public/Product/' . $product->thumbnail);
        }

        if ($product->size_image && Storage::exists('public/Product/' . $product->size_image)) {
            Storage::delete('public/Product/' . $product->size_image);
        }

        $product_images = ProductImage::where('product_id', $product->id)->get();
        foreach ($product_images as $product_image) {
            if ($product_image->image_url && Storage::exists('public/Product/' . $product_image->image_url)) {
                Storage::delete('public/Product/' . $product_image->image_url);
            }
        }

        $product_variants = ProductVariant::where('product_id', $product->id)->get();
        foreach ($product_variants as $product_variant) {
            if ($product_variant->image_url && Storage::exists('public/Product/' . $product_variant->image_url)) {
                Storage::delete('public/Product/' . $product_variant->image_url);
            }
        }

        $product->forceDelete();

        return redirect()->route('product.index')->with('success', 'Product is deleted permanently');
    }

    public function render()
    {
        return view('livewire.product-table', [
            'products' => Product::orderBy('id', 'DESC')->where('name', 'like', '%' . $this->search . '%')->paginate(10)
        ]);
    }
}
