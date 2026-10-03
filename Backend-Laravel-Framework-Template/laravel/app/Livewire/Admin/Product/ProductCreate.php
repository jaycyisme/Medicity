<?php

namespace App\Livewire\Admin\Product;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Speciality;
use Illuminate\Support\Str;
use App\Models\PackagingType;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $category_id;
    public $brand_id;
    public $speciality_id;
    public $tag;
    public $slug;
    public $base_price;
    public $description;
    public $ingredient;
    public $indication;
    public $precaution;
    public $usage_instruction;
    public $manufacturing_info;
    public $thumbnail;
    public $is_prescription;

    public $variants = [
        [
            'product_id' => '',
            'packaging_type' => '',
            'size' => '',
            'color' => '',
            'image_url' => '',
            'quantity' => '',
            'sku' => '',
            'price' => '',
            'is_sale' => '',
            'sale_price' => '',
            'sale_start_time' => '',
            'sale_end_time' => '',
        ],
    ];

    public $images;


    public $categories;
    public $colors;
    public $sizes;
    public $packaging_types;
    public $brands;
    public $specialities;

    public function mount() {
        $this->categories = Category::all();
        $this->sizes = Size::all();
        $this->colors = Color::all();
        $this->packaging_types = PackagingType::all();
        $this->brands = Brand::all();
        $this->specialities = Speciality::all();
    }

    public function addVariant() {
        $this->variants[] = [
            'product_id' => '',
            'packaging_type' => '',
            'size' => '',
            'color' => '',
            'image_url' => '',
            'quantity' => '',
            'sku' => '',
            'price' => '',
            'is_sale' => '',
            'sale_price' => '',
            'sale_start_time' => '',
            'sale_end_time' => '',
        ];

        $index = count($this->variants) - 1;
        $this->dispatch('variant-added', index: $index);
    }

    public function removeVariant($index) {
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
    }

    public function updatePackagingType($index, $value) {
        $packaging_type = PackagingType::firstOrCreate(['name' => $value]);
        $this->variants[$index]['packaging_type'] = $packaging_type->name;
        $this->packaging_types = PackagingType::all();
    }

    public function updateColor($index, $value) {
        $color = Color::firstOrCreate(['name' => $value]);
        $this->variants[$index]['color'] = $color->name;
        $this->colors = Color::all();
    }

    public function updateSize($variantIndex, $value) {
        $size = Size::firstOrCreate(['name' => $value]);
        $this->variants[$variantIndex]['size'] = $size->name;
        $this->sizes = Size::all();
    }

    public function updateSalePrice($variantIndex, $value) {
        $sale_price = $this->variants[$variantIndex]['price'] - ($this->variants[$variantIndex]['price'] * (int)$value / 100);
        $this->variants[$variantIndex]['sale_price'] = $sale_price;
    }

    public function save() {
        if (!$this->category_id) {
            $this->category_id = Category::first()->id;
        }
        if (!$this->brand_id) {
            $this->brand_id = Brand::first()->id;
        }
        if (!$this->speciality_id) {
            $this->speciality_id = Speciality::first()->id;
        }
        $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'speciality_id' => 'nullable|exists:specialities,id',
            'base_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'ingredient' => 'nullable|string',
            'indication' => 'nullable|string',
            'precaution' => 'nullable|string',
            'usage_instruction' => 'nullable|string',
            'manufacturing_info' => 'nullable|string',
            'tag' => 'nullable|string',
            'thumbnail' => 'nullable|string',
            'is_prescription' => 'boolean',
            'variants.*.color' => 'sometimes|nullable|string',
            'variants.*.packaging_type' => 'sometimes|nullable|string',
            'variants.*.size' => 'sometimes|nullable|string',
            'variants.*.image_url' => 'required|string',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.is_sale' => 'boolean',
            'variants.*.sale_price' => 'nullable|numeric|min:0',
            'variants.*.quantity' => 'required|integer|min:0',
            'variants.*.sale_start_time' => 'nullable|date',
            'variants.*.sale_end_time' => 'nullable|date|after_or_equal:variants.*.sale_start_time',
        ]);

        $product = new Product();
        $product->name = $this->name;

        $product->category_id = $this->category_id;
        $product->brand_id = $this->brand_id;
        $product->speciality_id = $this->speciality_id;

        $product->tag = $this->tag;

        $this->slug = $product->generateUniqueSlug($this->name);
        $product->slug = $this->slug;

        $product->base_price = $this->base_price;
        $product->description = $this->description;
        $product->ingredient = $this->ingredient;
        $product->indication = $this->indication;
        $product->precaution = $this->precaution;
        $product->usage_instruction = $this->usage_instruction;
        $product->manufacturing_info = $this->manufacturing_info;
        $product->thumbnail = $this->thumbnail;
        $product->is_prescription = $this->is_prescription ?: 0;

        $product->save();

        foreach ($this->variants as $variantData) {
            $color = Color::firstOrCreate(['name' => $variantData['color']]);
            $size = Size::firstOrCreate(['name' => $variantData['size']]);
            $packaging_type = PackagingType::firstOrCreate(['name' => $variantData['packaging_type']]);

            $variant = $product->variants()->create([
                'color_id' => $color->id,
                'size_id' => $size->id,
                'packaging_type_id' => $packaging_type->id,
                'image_url' => $variantData['image_url'],
                'quantity' => $variantData['quantity'],
                'sku' => Str::upper(Str::slug($product->name . '-' . $color->name . '-' . $size->name)),
                'price' => $variantData['price'],
                'is_sale' => $variantData['is_sale'] ?: false,
                'sale_price' => $variantData['sale_price'] ?: 0,
                'sale_start_time' => !empty($variantData['sale_start_time']) ? $variantData['sale_start_time'] : null,
                'sale_end_time' => !empty($variantData['sale_end_time']) ? $variantData['sale_end_time'] : null,
            ]);
        }

        $imageArray = array_filter(explode(',', $this->images));
        foreach ($imageArray as $key => $image) {
            $productImage = $product->images()->create([
                'image_url' => $image,
                'sort_order' => $key + 1,
            ]);
        }

        return redirect()->route('product.index')->with('success','Product is created successfully');
    }

    public function render()
    {
        return view('livewire.admin.product.product-create');
    }
}
