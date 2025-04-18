<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Speciality;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SpecialityTable extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $specialities_deleted;
    public function mount() {
        $this->specialities_deleted = Speciality::onlyTrashed()->get();
    }

    public function restore($id) {
        $speciality = Speciality::withTrashed()->findOrfail($id);

        $speciality->restore();

        return redirect()->route('speciality.index')->with('success','Speciality is restored successfuly.');
    }

    public function forceDelete($id) {
        $speciality = Speciality::withTrashed()->findOrfail($id);

        if($speciality->image_url && Storage::exists('public/Speciality/' . $speciality->image_url)) {
            Storage::delete('public/Speciality/' . $speciality->image_url);
        }

        if($speciality->sub_image_url && Storage::exists('public/Speciality/' . $speciality->sub_image_url)) {
            Storage::delete('public/Speciality/' . $speciality->sub_image_url);
        }

        // $products = Product::withTrashed()->where('category_id', $category->id)->get();

        // foreach ($products as $product) {
        //     if ($product->thumbnail && Storage::exists('public/Product/' . $product->thumbnail)) {
        //         Storage::delete('public/Product/' . $product->thumbnail);
        //     }

        //     if ($product->size_image && Storage::exists('public/Product/' . $product->size_image)) {
        //         Storage::delete('public/Product/' . $product->size_image);
        //     }

        //     $product_images = ProductImage::where('product_id', $product->id)->get();
        //     foreach ($product_images as $product_image) {
        //         if ($product_image->image_url && Storage::exists('public/Product/' . $product_image->image_url)) {
        //             Storage::delete('public/Product/' . $product_image->image_url);
        //         }
        //     }

        //     $product_variants = ProductVariant::where('product_id', $product->id)->get();
        //     foreach ($product_variants as $product_variant) {
        //         if ($product_variant->image_url && Storage::exists('public/Product/' . $product_variant->image_url)) {
        //             Storage::delete('public/Product/' . $product_variant->image_url);
        //         }
        //     }
        // }

        $speciality->forceDelete();

        return redirect()->route('speciality.index')->with('success','Speciality is deleted permanently.');
    }


    public function render()
    {
        return view('livewire.speciality-table', [
            'specialities' => Speciality::orderBy('id', 'DESC')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
