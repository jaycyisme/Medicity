<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\ProductImage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Storage;

class CategoryTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $categories_deleted;
    public function mount() {
        $this->categories_deleted = Category::onlyTrashed()->get();
    }

    public function restore($id) {
        $category = Category::withTrashed()->findOrfail($id);

        $category->restore();

        return redirect()->route('category.index')->with('success','Category is restored successfully');
    }

    public function forceDelete($id) {
        $category = Category::withTrashed()->findOrfail($id);

        if($category->image_url && Storage::exists('public/Category/' . $category->image_url)) {
            Storage::delete('public/Category/' . $category->image_url);
        }

        $products = Product::withTrashed()->where('category_id', $category->id)->get();

        foreach ($products as $product) {
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
        }

        $category->forceDelete();

        return redirect()->route('category.index')->with('success','Category is deleted permanently');
    }

    public function render()
    {
        return view('livewire.category-table', [
            'categories' => Category::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
