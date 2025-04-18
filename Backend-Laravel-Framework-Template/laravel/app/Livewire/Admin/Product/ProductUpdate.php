<?php

namespace App\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\PackagingType;
use Illuminate\Support\Str;
use App\Models\ProductVariant;
use App\Models\Speciality;
use Illuminate\Support\Facades\Storage;

class ProductUpdate extends Component
{
    public $id;
    public $product;
    public $name;
    public $category_id;
    public $brand_id;
    public $speciality_id;
    public $base_price;
    public $thumbnail;
    public $size_image;
    public $description;
    public $ingredient;
    public $indication;
    public $precaution;
    public $usage_instruction;
    public $manufacturing_info;
    public $is_prescription;
    public $images;
    public $variants;

    public $categories;
    public $brands;
    public $specialities;
    public $packaging_types;
    public $colors;
    public $sizes;

    public $current_images;

    public function mount($id) {
        $this->id = $id;
        $this->product = Product::with(['category', 'brand', 'speciality', 'variants.color', 'variants.size', 'variants.packagingType', 'variants', 'images'])->findOrFail($id);
        $this->name = $this->product->name;
        $this->category_id = $this->product->category_id;
        $this->brand_id = $this->product->brand_id;
        $this->speciality_id = $this->product->speciality_id;
        $this->base_price = $this->product->base_price;
        $this->thumbnail = $this->product->thumbnail;
        $this->size_image = $this->product->size_image;
        $this->description = $this->product->description;
        $this->ingredient = $this->product->ingredient;
        $this->indication = $this->product->indication;
        $this->precaution = $this->product->precaution;
        $this->usage_instruction = $this->product->usage_instruction;
        $this->manufacturing_info = $this->product->manufacturing_info;
        $this->is_prescription = $this->product->is_prescription;
        $this->images = $this->product->images->pluck('image_url')->implode(',');
        $this->variants = $this->product->variants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'packaging_type' => ['name' => $variant->packagingType->name ?? ''],
                'color' => ['name' => $variant->color->name ?? ''],
                'size' => ['name' => $variant->size->name ?? ''],
                'image_url' => $variant->image_url,
                'sku' => $variant->sku ?? '',
                'price' => $variant->price ?? 0,
                'is_sale' => $variant->is_sale ?? false,
                'sale_price' => $variant->sale_price ?? 0,
                'quantity' => $variant->quantity ?? 0,
                'sale_start_time' => $variant->sale_start_time ? date('Y-m-d\TH:i', strtotime($variant->sale_start_time)) : null,
                'sale_end_time' => $variant->sale_end_time ? date('Y-m-d\TH:i', strtotime($variant->sale_end_time)) : null,
            ];
        })->toArray();

        $this->categories = Category::all();
        $this->colors = Color::all();
        $this->sizes = Size::all();
        $this->packaging_types = PackagingType::all();
        $this->brands = Brand::all();
        $this->specialities = Speciality::all();

        $this->current_images = $this->product->images;

        // dd($this->variants);
    }

    public function addVariant() {
        $this->variants[] = [
            'product_id' => '',
            'color' => [],
            'size' => [],
            'packaging_type' => [],
            'image_url' => '',
            'sku' => '',
            'price' => '',
            'is_sale' => '',
            'sale_price' => '',
            'quantity' => '',
            'sale_start_time' => '',
            'sale_end_time' => '',
        ];

        $index = count($this->variants) - 1;
        $this->dispatch('variant-added', index: $index);
    }

    public function removeVariant($index) {
        if (isset($this->variants[$index])) {
            $variant = $this->variants[$index];

            if (isset($variant['id'])) {
                $productVariant = ProductVariant::findOrFail($variant['id']);
                if($productVariant) {
                    if (Storage::exists('public/Product/' . $productVariant->image_url)) {
                        Storage::delete('public/Product/' . $productVariant->image_url);
                    }
                    $productVariant->delete();
                }
            }

            unset($this->variants[$index]);

            $this->variants = array_values($this->variants);
        }
    }

    public function updatePackagingType($variantIndex, $value) {
        $packaging_type = PackagingType::firstOrCreate(['name' => $value]);
        $this->variants[$variantIndex]['packaging_type']['name'] = $packaging_type->name;
        $this->packaging_types = PackagingType::all();
    }

    public function updateColor($index, $value) {
        $color = Color::firstOrCreate(['name' => $value]);
        $this->variants[$index]['color']['name'] = $color->name;
        $this->colors = Color::all();
    }

    public function updateSize($variantIndex, $value) {
        $size = Size::firstOrCreate(['name' => $value]);
        $this->variants[$variantIndex]['size']['name'] = $size->name;
        $this->sizes = Size::all();
    }

    public function updateSalePrice($variantIndex, $value) {
        $sale_price = $this->variants[$variantIndex]['price'] - ($this->variants[$variantIndex]['price'] * (int)$value / 100);
        $this->variants[$variantIndex]['sale_price'] = $sale_price;
    }

    public function save() {
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
            'thumbnail' => 'required|string',
            'is_prescription' => 'boolean',
            'variants.*.packaging_type.name' => 'nullable|string',
            'variants.*.color.name' => 'nullable|string',
            'variants.*.size.name' => 'nullable|string',
            'variants.*.image_url' => 'required|string',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.is_sale' => 'boolean',
            'variants.*.sale_price' => 'nullable|numeric|min:0',
            'variants.*.quantity' => 'required|integer|min:0',
            'variants.*.sale_start_time' => 'nullable|date',
            'variants.*.sale_end_time' => 'nullable|date|after_or_equal:variants.*.sale_start_time',
        ]);
        $product = Product::findOrFail($this->id);
        $product->name = $this->name;
        $product->category_id = $this->category_id;
        $product->brand_id = $this->brand_id;
        $product->speciality_id = $this->speciality_id;
        $product->base_price = $this->base_price;
        $product->description = $this->description;
        $product->ingredient = $this->ingredient;
        $product->indication = $this->indication;
        $product->precaution = $this->precaution;
        $product->usage_instruction = $this->usage_instruction;
        $product->manufacturing_info = $this->manufacturing_info;
        $product->is_prescription = $this->is_prescription ?: 0;

        if ($this->thumbnail !== $product->thumbnail) {
            if ($product->thumbnail && Storage::exists('public/Product/' . $product->thumbnail)) {
                Storage::delete('public/Product' . $product->thumbnail);
            }
            $product->thumbnail = $this->thumbnail;
        }

        $product->save();

        $product->slug = $product->generateUniqueSlug($product->name);

        $this->updateProductImages($product);

        $this->updateVariants($product);

        return redirect()->route('product.index')->with('success','Sản phẩm đã được chỉnh sửa thành công');
    }

    public function updateProductImages($product) {
        // Xóa hình ảnh cũ
        $product->images()->delete();

        // Thêm hình ảnh mới
        $imageArray = array_filter(explode(',', $this->images));
        foreach ($imageArray as $key => $image) {
            $productImage = $product->images()->create([
                'image_url' => $image,
                'sort_order' => $key + 1,
            ]);
        }
    }

    public function updateVariants($product) {
        foreach ($this->variants as $variantData) {
            $colorName = isset($variantData['color']['name']) && !empty($variantData['color']['name']) ? $variantData['color']['name'] : null;
            $sizeName = isset($variantData['size']['name']) && !empty($variantData['size']['name']) ? $variantData['size']['name'] : null;
            $packagingTypeName = isset($variantData['packaging_type']['name']) && !empty($variantData['packaging_type']['name']) ? $variantData['packaging_type']['name'] : null;

            $packaging_type = $packagingTypeName ? PackagingType::firstOrCreate(['name' => $packagingTypeName]) : null;
            $color = $colorName ? Color::firstOrCreate(['name' => $colorName]) : null;
            $size = $sizeName ? Size::firstOrCreate(['name' => $sizeName]) : null;

            $variant = $product->variants()->updateOrCreate(
                ['id' => $variantData['id'] ?? null],
                [
                    'packaging_type_id' => $packaging_type ? $packaging_type->id : null,
                    'color_id' => $color ? $color->id : null,
                    'size_id' => $size ? $size->id : null,
                    'image_url' => $variantData['image_url'] ?? '',
                    'sku' => Str::upper(Str::slug($product->name . '-' . ($colorName ?? 'NoColor') . '-' . ($sizeName ?? 'NoSize'))),
                    'price' => (double) $variantData['price'] ?? 0,
                    'is_sale' => isset($variantData['is_sale']) && $variantData['is_sale'] ? 1 : 0,
                    'sale_price' => (double) $variantData['sale_price'] ?? 0,
                    'quantity' => $variantData['quantity'] ?? 0,
                    'sale_start_time' => !empty($variantData['sale_start_time']) ? date('Y-m-d H:i:s', strtotime($variantData['sale_start_time'])) : null,
                    'sale_end_time' => !empty($variantData['sale_end_time']) ? date('Y-m-d H:i:s', strtotime($variantData['sale_end_time'])) : null,
                ]
            );
        }
    }

    public function render()
    {
        return view('livewire.admin.product.product-update');
    }
}
