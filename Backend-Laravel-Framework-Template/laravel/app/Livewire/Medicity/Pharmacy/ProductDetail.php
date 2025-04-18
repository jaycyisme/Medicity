<?php

namespace App\Livewire\Medicity\Pharmacy;

use App\Models\Color;
use App\Models\PackagingType;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Component;

class ProductDetail extends Component
{
    public $id;
    public $product;
    public $main_price;
    public $selectedQuantity = 1;
    public $selectedSizeId = null;
    public $sizes;
    public $selectedPackagingTypeId = null;
    public $packagingTypes;
    public $selectedColorId = null;
    public $colors;
    public $original_price;
    public $sale_price;

    public function mount($name, $id)
    {
        $this->id = $id;
        $this->product = Product::findOrFail($this->id);

        // Lấy base_price ban đầu
        $this->main_price = $this->product->base_price;
        $this->original_price = $this->product->base_price;
        $this->sale_price = null;

        $packagingType_ids = $this->product->variants->pluck('packaging_type_id')->filter()->unique()->toArray();
        $size_ids = $this->product->variants->pluck('size_id')->filter()->unique()->toArray();
        $color_ids = $this->product->variants->pluck('color_id')->filter()->unique()->toArray();

        $this->packagingTypes = !empty($packagingType_ids) ? PackagingType::whereIn('id', $packagingType_ids)->get() : collect();
        $this->sizes = !empty($size_ids) ? Size::whereIn('id', $size_ids)->get() : collect();
        $this->colors = !empty($color_ids) ? Color::whereIn('id', $color_ids)->get() : collect();
    }

    public function increaseQuantity()
    {
        $this->selectedQuantity++;
    }

    public function decreaseQuantity()
    {
        if ($this->selectedQuantity > 1) {
            $this->selectedQuantity--;
        }
    }

    public function togglePackagingType($packagingTypeId)
    {
        if ($this->selectedPackagingTypeId == $packagingTypeId) {
            $this->selectedPackagingTypeId = null;
            $this->resetSizeAndColor();
        } else {
            $this->selectedPackagingTypeId = $packagingTypeId;
            $this->updateSizeAndColor();
        }
        $this->updatePrice();
    }

    public function toggleSize($sizeId)
    {
        if ($this->selectedSizeId == $sizeId) {
            $this->selectedSizeId = null;
            $this->resetColorOptions();
        } else {
            $this->selectedSizeId = $sizeId;
            $this->updateColorAndPrice();
        }
        $this->updatePrice();
    }

    public function toggleColor($colorId)
    {
        if ($this->selectedColorId == $colorId) {
            $this->selectedColorId = null;
            $this->resetSizeOptions();
        } else {
            $this->selectedColorId = $colorId;
            $this->updateSizeAndPrice();
        }
        $this->updatePrice();
    }

    public function resetSizeAndColor()
    {
        $this->selectedSizeId = null;
        $this->selectedColorId = null;
        $this->sizes = Size::whereIn('id', $this->product->variants->pluck('size_id')->filter()->unique()->toArray())->get();
        $this->colors = Color::whereIn('id', $this->product->variants->pluck('color_id')->filter()->unique()->toArray())->get();
    }

    public function resetSizeOptions()
    {
        $this->sizes = Size::whereIn('id', $this->product->variants->pluck('size_id')->filter()->unique()->toArray())->get();
    }

    public function resetColorOptions()
    {
        $this->colors = Color::whereIn('id', $this->product->variants->pluck('color_id')->filter()->unique()->toArray())->get();
    }

    public function updateSizeAndColor()
    {
        $size_ids = ProductVariant::where('packaging_type_id', $this->selectedPackagingTypeId)
            ->where('product_id', $this->product->id)
            ->where('quantity', '>', 0)
            ->pluck('size_id');

        $color_ids = ProductVariant::where('packaging_type_id', $this->selectedPackagingTypeId)
            ->where('product_id', $this->product->id)
            ->where('quantity', '>', 0)
            ->pluck('color_id');

        $this->sizes = Size::whereIn('id', $size_ids)->get();
        $this->colors = Color::whereIn('id', $color_ids)->get();
    }

    public function updateColorAndPrice()
    {
        if (!$this->selectedSizeId) {
            $this->resetColorOptions();
            return;
        }

        $color_ids = ProductVariant::where('size_id', $this->selectedSizeId)
            ->where('product_id', $this->product->id)
            ->where('quantity', '>', 0)
            ->pluck('color_id');

        $this->colors = Color::whereIn('id', $color_ids)->get();

        $this->updatePrice();
    }

    public function updateSizeAndPrice()
    {
        if (!$this->selectedColorId) {
            $this->resetSizeOptions();
            return;
        }

        $size_ids = ProductVariant::where('color_id', $this->selectedColorId)
            ->where('product_id', $this->product->id)
            ->where('quantity', '>', 0)
            ->pluck('size_id');

        $this->sizes = Size::whereIn('id', $size_ids)->get();

        $this->updatePrice();
    }

    public function updatePrice()
    {
        if (!$this->selectedPackagingTypeId && !$this->selectedSizeId && !$this->selectedColorId) {
            $this->original_price = $this->product->base_price;
            $this->sale_price = null;
            $this->main_price = $this->product->base_price;
            return;
        }

        $variantQuery = ProductVariant::where('product_id', $this->product->id);

        if ($this->selectedPackagingTypeId) {
            $variantQuery->where('packaging_type_id', $this->selectedPackagingTypeId);
        }
        if ($this->selectedSizeId) {
            $variantQuery->where('size_id', $this->selectedSizeId);
        }
        if ($this->selectedColorId) {
            $variantQuery->where('color_id', $this->selectedColorId);
        }

        $variant = $variantQuery->first();

        if ($variant) {
            $this->original_price = $variant->price;
            $this->sale_price = $variant->is_sale ? $variant->sale_price : null;
            $this->main_price = $variant->is_sale ? $variant->sale_price : $variant->price;
        } else {
            $this->original_price = $this->product->base_price;
            $this->sale_price = null;
            $this->main_price = $this->product->base_price;
        }
    }

    public function addToCart()
    {
        // Kiểm tra nếu chưa chọn đầy đủ biến thể (nếu sản phẩm có biến thể đó)
        if (($this->sizes->count() > 0 && !$this->selectedSizeId) ||
            ($this->colors->count() > 0 && !$this->selectedColorId) ||
            ($this->packagingTypes->count() > 0 && !$this->selectedPackagingTypeId)) {
                return redirect()->route('product-detail', ['name' => toSlug($this->product->name), 'id'=>$this->id])->with('error','Vui lòng chọn đầy đủ các tùy chọn của sản phẩm trước khi thêm vào giỏ hàng');
        }

        // Tìm biến thể sản phẩm phù hợp với các tùy chọn đã chọn
        $variantQuery = ProductVariant::where('product_id', $this->product->id);

        if ($this->selectedPackagingTypeId) {
            $variantQuery->where('packaging_type_id', $this->selectedPackagingTypeId);
        }
        if ($this->selectedSizeId) {
            $variantQuery->where('size_id', $this->selectedSizeId);
        }
        if ($this->selectedColorId) {
            $variantQuery->where('color_id', $this->selectedColorId);
        }

        $variant = $variantQuery->first();

        if (!$variant) {
            return redirect()->route('product-detail', ['name' => toSlug($this->product->name), 'id'=>$this->id])->with('error', 'Không tìm thấy sản phẩm với các lựa chọn đã chọn.');
        }

        if ($variant->quantity <= 0) {
            return redirect()->route('product-detail', ['name' => toSlug($this->product->name), 'id'=>$this->id])->with('error', 'Sản phẩm này hiện đã hết hàng.');
        }

        // Xác định giá sản phẩm (giá gốc hoặc giá giảm nếu có sale)
        $unit_price = $variant->is_sale ? $variant->sale_price : $variant->price;
        $total_price = $unit_price * $this->selectedQuantity;

        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        if (isset($cart[$variant->id])) {
            // Nếu sản phẩm đã có trong giỏ, cập nhật số lượng & tổng giá
            $cart[$variant->id]['quantity'] += $this->selectedQuantity;
            $cart[$variant->id]['total_price'] = $cart[$variant->id]['quantity'] * $cart[$variant->id]['price'];
        } else {
            // Nếu sản phẩm chưa có trong giỏ, thêm mới
            $cart[$variant->id] = [
                'order_id' => null, // Chưa có order_id vì chưa checkout
                'product_variant_id' => $variant->id,
                'product_name' => $variant->product->name,
                'image' => $variant->image_url,
                'size' => $variant->size ? $variant->size->name : null,
                'color' => $variant->color ? $variant->color->name : null,
                'packaging' => $variant->packagingType ? $variant->packagingType->name : null,
                'quantity' => $this->selectedQuantity,
                'price' => $unit_price,
                'total_price' => $total_price,
            ];
        }

        // Cập nhật session giỏ hàng
        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Product has been successfully added to cart.');
    }

    public function buyNow()
    {
        // Kiểm tra nếu chưa chọn đầy đủ biến thể (nếu có)
        if (($this->sizes->count() > 0 && !$this->selectedSizeId) ||
            ($this->colors->count() > 0 && !$this->selectedColorId) ||
            ($this->packagingTypes->count() > 0 && !$this->selectedPackagingTypeId)) {
            return redirect()->route('product-detail', ['name' => toSlug($this->product->name), 'id' => $this->id])
                ->with('error', 'Please select all product options before buying now.');
        }

        // Tìm biến thể sản phẩm phù hợp với các tùy chọn đã chọn
        $variantQuery = ProductVariant::where('product_id', $this->product->id);
        if ($this->selectedPackagingTypeId) {
            $variantQuery->where('packaging_type_id', $this->selectedPackagingTypeId);
        }
        if ($this->selectedSizeId) {
            $variantQuery->where('size_id', $this->selectedSizeId);
        }
        if ($this->selectedColorId) {
            $variantQuery->where('color_id', $this->selectedColorId);
        }

        $variant = $variantQuery->first();

        if (!$variant) {
            return redirect()->route('product-detail', ['name' => toSlug($this->product->name), 'id' => $this->id])
                ->with('error', 'No products were found with the selected options.');
        }

        if ($variant->quantity <= 0) {
            return redirect()->route('product-detail', ['name' => toSlug($this->product->name), 'id' => $this->id])
                ->with('error', 'This product is currently out of stock.');
        }

        // Xác định giá sản phẩm (giá gốc hoặc giá giảm nếu có sale)
        $unit_price = $variant->is_sale ? $variant->sale_price : $variant->price;
        $total_price = $unit_price * $this->selectedQuantity;

        // Lưu thông tin sản phẩm vào session `buy_now`
        session()->put('buy_now', [
            'product_variant_id' => $variant->id,
            'product_name' => $variant->product->name,
            'image' => $variant->image_url,
            'size' => $variant->size ? $variant->size->name : null,
            'color' => $variant->color ? $variant->color->name : null,
            'packaging' => $variant->packagingType ? $variant->packagingType->name : null,
            'quantity' => $this->selectedQuantity,
            'price' => $unit_price,
            'total_price' => $total_price,
        ]);

        return redirect()->route('checkout')->with('success', 'Go to checkout page.');
    }

    public function render()
    {
        return view('livewire.medicity.pharmacy.product-detail');
    }
}
