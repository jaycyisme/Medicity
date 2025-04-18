<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\ProductImage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Storage;

class BrandTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $brands_deleted;
    public function mount() {
        $this->brands_deleted = Brand::onlyTrashed()->get();
    }

    public function restore($id) {
        $brand = Brand::withTrashed()->findOrfail($id);

        $brand->restore();

        return redirect()->route('brand.index')->with('success','Brand is restored successfully');
    }

    public function forceDelete($id) {
        $brand = Brand::withTrashed()->findOrfail($id);

        if($brand->image_url && Storage::exists('public/Brand/' . $brand->image_url)) {
            Storage::delete('public/Brand/' . $brand->image_url);
        }

        $products = Product::withTrashed()->where('brand_id', $brand->id)->get();

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

        $brand->forceDelete();

        return redirect()->route('brand.index')->with('success','Brand is deleted permanently');
    }

    public function render()
    {
        return view('livewire.brand-table', [
            'brands' => Brand::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
