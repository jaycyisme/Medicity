<?php

namespace App\Livewire\Medicity\Pharmacy;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Speciality;
use Livewire\WithPagination;
use App\Models\ProductVariant;
use App\Models\ProductFeedback;
use Livewire\Attributes\Computed;
use Illuminate\Database\Eloquent\Builder;

class PharmacyList extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $products;
    public $categories;
    public $specialities;
    public $brands;

    public $priceFilter = null;
    public $categoryFilter = null;
    public $specialityFilter = null;
    public $brandFilter = null;
    public $sortOption = null;
    public $ratingFilter = null;
    public $selectedProduct = null;
    public $selectedVariants = [];
    public $selectedQuantity = 1;
    public $selectedVariantId = 1;


    public function mount() {
        $this->products = collect();
        $this->categories = Category::all();
        $this->specialities = Speciality::all();
        $this->brands = Brand::all();

        $this->loadProducts();
    }

    public function showProduct($productId)
    {
        $this->selectedProduct = Product::with(['brand', 'category', 'variants'])->find($productId);

        if ($this->selectedProduct) {
            $this->selectedVariants = $this->selectedProduct->variants;
            $this->selectedVariantId = null; // Reset biến thể khi mở modal mới
        }
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

    public function placeholder() {
        return <<<'HTML'
        <div class = "self-center loading loading-spinner">
            <img style="display: none" src="{{ asset('medicity/assets/img/logo.svg') }}" alt="">
        </div>
        HTML;
    }

    public function filterChange() {
        $this->loadMore();
        $this->products = collect();
        $this->loadProducts();
    }

    private function parseProduct(Product $product): array
    {
        // Lấy dữ liệu cần thiết từ product
        // $variations = $product->productVariations->map(function ($variation) {
        //     return $variation->only(['is_sale', 'sale_price', 'price']);
        // });

        $productData = $product->only([
            'id',
            'name',
            'thumbnail',
            'base_price',
            // 'min_price',
            // 'max_price',
            // 'category_id',
        ]);

        // Gộp các dữ liệu lại
        return array_merge($productData,
        //  ['variations' => $variations]
        );
    }

    public function loadProducts(bool $loadingMore = false): void
    {
        // Truy vấn sản phẩm ban đầu
        // $query = Product::with(['productVariations' => function($query) {
        //     $query->select('product_id', 'is_sale', 'sale_price', 'price');
        // }]);

        $query = Product::query()->with('activeFeedbacks');

        // Áp dụng bộ lọc và sắp xếp
        // if ($this->priceFilter) {
        //     $query->whereHas('productVariations', function($q) {
        //         $q->whereRaw('(CASE WHEN is_sale THEN sale_price ELSE price END) <= ?', [$this->priceFilter]);
        //     });
        // }

        if ($this->priceFilter) {
            $query->where('base_price', '<=', $this->priceFilter);
        }

        if ($this->categoryFilter) {
            $query->where('category_id', $this->categoryFilter);
        }

        if ($this->specialityFilter) {
            $query->where('speciality_id', $this->specialityFilter);
        }

        if ($this->brandFilter) {
            $query->where('brand_id', $this->brandFilter);
        }

        // Lọc theo số sao đánh giá (rating)
        if ($this->ratingFilter) {
            $query->whereHas('activeFeedbacks', function ($q) {
                $q->havingRaw('AVG(star) >= ?', [$this->ratingFilter]);
            });
        }

        // if ($this->sizeFilter) {
        //     $query->whereHas('productVariations', function($q) {
        //         $q->where('size_id', $this->sizeFilter);
        //     });
        // }

        // if ($this->colorFilter) {
        //     $query->whereHas('productVariations', function($q) {
        //         $q->where('color_id', $this->colorFilter);
        //     });
        // }

        // Sắp xếp theo giá
        if ($this->sortOption === 'lowtohigh') {
            $query->orderBy('base_price', 'asc');
        } elseif ($this->sortOption === 'hightolow') {
            $query->orderBy('base_price', 'desc');
        }

        // Lấy danh sách sản phẩm và giới hạn 8 sản phẩm mỗi lần
        $products = $query->limit(8)
                            ->when($loadingMore, fn (Builder $query) => $query->offset($this->products->count()))
                            ->get();

        // Chuyển đổi và thêm sản phẩm vào danh sách hiện tại
        $products->each(fn (Product $product) => $this->products->push($this->parseProduct($product)));
    }

    public function loadMore(): void
    {
        $this->loadProducts(loadingMore: true);
    }

    #[Computed]
    public function hasMore(): bool
    {
        return $this->products->count() < Product::count();
    }

    public function addToCart($productId)
    {
        if (!$this->selectedVariantId) {
            return redirect()->route('pharmacy-list')->with('error', 'Please select a variation before adding to cart.');
        }

        $variant = ProductVariant::where('id', $this->selectedVariantId)
            ->where('product_id', $productId)
            ->first();

        if (!$variant) {
            return redirect()->route('pharmacy-list')->with('error', 'No matching product variations found.');
        }

        if ($variant->quantity <= 0) {
            return redirect()->route('pharmacy-list')->with('error', 'This product is currently out of stock.');
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
                'order_id' => null,
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

    public function buyNow($productId)
    {
        if (!$this->selectedVariantId) {
            return redirect()->route('pharmacy-list')->with('error', 'Please select a variation before adding to cart.');
        }

        $variant = ProductVariant::where('id', $this->selectedVariantId)
            ->where('product_id', $productId)
            ->first();

        if (!$variant) {
            return redirect()->route('pharmacy-list')->with('error', 'No matching product variations found.');
        }

        if ($variant->quantity <= 0) {
            return redirect()->route('pharmacy-list')->with('error', 'This product is currently out of stock.');
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
        return view('livewire.medicity.pharmacy.pharmacy-list', [
            'products' => $this->products
        ]);
    }
}
