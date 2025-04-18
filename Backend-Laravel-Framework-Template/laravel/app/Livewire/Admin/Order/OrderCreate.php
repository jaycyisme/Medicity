<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderType;
use App\Models\CouponType;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Support\Str;
use App\Models\PaymentMethod;
use App\Models\ProductVariant;
use App\Models\ViettelPostCity;
use App\Models\ViettelPostWard;
use App\Models\ViettelPostDistrict;
use Illuminate\Support\Facades\Auth;

class OrderCreate extends Component
{
    public $search = '';
    public $total_amount;
    public $discount_amount;
    public $final_amount;
    public $order_code;
    public $order_type_id = 1;
    public $order_status_id = 1;
    public $payment_method_id = 1;
    public $payment_status_id = 1;
    public $note;
    public $customer_name;
    public $customer_phone;
    public $customer_email;
    public $customer_address;
    public $shipping_city;
    public $shipping_district;
    public $shipping_ward;
    public $shipping_detail;
    public $shipping_phone;
    public $shipping_fee = 0;

    public $paymentMethods;
    public $orderStatuses;
    public $orderTypes;

    public $citiesList = [];
    public $districtsList = [];
    public $wardsList = [];

    public $isOnlineOrder = false;

    public $selectedAddress = [];
    public $orderItems = [];

    public $errorMessages = [];

    public $coupon_code;
    public $couponApplied = false;


    public function mount() {
        $this->paymentMethods = PaymentMethod::all();
        $this->orderStatuses = OrderStatus::all();
        $this->orderTypes = OrderType::all();
        $this->citiesList = ViettelPostCity::get();

        $inStoreOrderType = OrderType::where('name', 'Instore')->first();
        $this->order_type_id = $inStoreOrderType->id;
    }

    public function changeOrderType($value) {
        $orderType = OrderType::findOrFail($value);
        if ($orderType->name === 'Online') {
            $this->isOnlineOrder = true;
        }else {
            $this->isOnlineOrder = false;
        }
    }

    public function onChangeCity()
    {
        if(isset($this->shipping_city)) {
            $this->districtsList = ViettelPostDistrict::where('province_id', '=', $this->shipping_city)->get();
        }
    }

    public function onChangeDistrict()
    {
        if(isset($this->shipping_district)) {
            $this->wardsList = ViettelPostWard::where('district_id', '=', $this->shipping_district)->get();
        }
    }

    public function addProduct($productId) {
        $product = Product::findOrFail($productId);
        $variants = ProductVariant::where('product_id', $productId)->where('quantity', '>', 0)->get();

        $this->orderItems[] = [
            'id' => $productId,
            'product_name' => $product->name,
            'variants' => $variants,
            'selected_variant' => null,
            'quantity' => 1,
            'price' => 0,
            'total' => 0
        ];
    }

    public function updateVariant($index, $variantId)
    {
        unset($this->errorMessages[$index]);
        if ($variantId == '') {
            $this->errorMessages[$index] = 'Vui lòng chọn biến thể hợp lệ.';
            $this->orderItems[$index]['selected_variant'] = null;
            return;
        }
        $variant = ProductVariant::find($variantId);
        if ($variant) {
            $this->orderItems[$index]['selected_variant'] = $variantId;
            $this->orderItems[$index]['price'] = $variant->is_sale ? $variant->sale_price : $variant->price;
            $this->updateTotal($index);
            $this->updateTotalMoney($index);
        }
    }

    public function updateQuantity($index, $quantity)
    {
        unset($this->errorMessages[$index]);
        $selectedVariantId = $this->orderItems[$index]['selected_variant'];
        if (!$selectedVariantId) {
            $this->errorMessages[$index] = 'Vui lòng chọn biến thể trước khi cập nhật số lượng.';
            return;
        }

        $variant = ProductVariant::findOrFail($selectedVariantId);

        if ($quantity > $variant->quantity) {
            $this->errorMessages[$index] = 'Số lượng vượt quá số lượng hiện có của biến thể này.';
            $this->orderItems[$index]['quantity'] = 1;
            return;
        }
        $this->orderItems[$index]['quantity'] = $quantity;
        $this->updateTotal($index);
        $this->updateTotalMoney($index);
    }

    private function updateTotal($index)
    {
        $this->orderItems[$index]['total'] =
        $this->orderItems[$index]['price'] * $this->orderItems[$index]['quantity'];
    }

    public function updateTotalMoney() {
        if (!is_numeric($this->discount_amount)) {
            $this->discount_amount = 0;
        }
        $this->final_amount = 0;
        foreach ($this->orderItems as $orderItem) {
            $this->final_amount += $orderItem['total'];
        }
        $this->total_amount = $this->final_amount;
        $this->final_amount -= $this->discount_amount;
        if ($this->final_amount < 0) {
            $this->final_amount = 0;
        }
    }

    public function removeProduct($index)
    {
        unset($this->orderItems[$index]);
        $this->orderItems = array_values($this->orderItems);
        $this->updateTotalMoney($index);
    }

    public function applyCoupon() {
        if ($this->couponApplied == true) {
            return session()->flash('error', 'Mã giảm giá đã được áp dụng. Không thể áp dụng lại.');
        }
        $coupon = Coupon::where('code', $this->coupon_code)->first();
        if(!$coupon) {
            return session()->flash('error', 'Mã giảm giá không hợp lệ.');
        }

        $coupon_type = CouponType::where('name', $coupon->couponType->name)->first();

        if($coupon->usage_limit >= 1) {
            if($coupon->start_time <= now()) {
                if($coupon->end_time >= now()) {
                    if($coupon_type->name === 'percentage') {
                        $this->discount_amount = ($this->billTotalMoney * $coupon->value)/100;
                    }
                    if($coupon_type->name === 'fixed') {
                        $this->discount_amount = $coupon->value;
                    }
                }else {
                    return session()->flash('error', 'Mã giảm giá đã hết hạn.');
                }
            }else {
                return session()->flash('error', 'Mã giảm giá chưa đến thời gian sử dụng.');
            }
        }else {
            return session()->flash('error', 'Mã giảm giá đã được sử dụng hết.');
        }

        $this->couponApplied = true;
        $this->updateTotalMoney();
        session()->flash('coupon_success', 'Mã giảm giá đã được áp dụng thành công.');
    }

    public function createBill() {
        if ($this->couponApplied) {
            $coupon = Coupon::where('code', $this->coupon_code)->first();
            $coupon->usage_limit--;
            $coupon->used_count++;
            $coupon->save();
        }

        foreach ($this->orderItems as $index => $orderItem) {
            if (empty($orderItem['selected_variant'])) {
                session()->flash('error', "Vui lòng chọn biến thể cho sản phẩm '{$orderItem['product_name']}'.");
                return;
            }
        }

        $realCity = ViettelPostCity::where('province_id', $this->shipping_city)->first();
        $realDistrict = ViettelPostDistrict::where('district_id', $this->shipping_district)->first();
        $realWard = ViettelPostWard::where('wards_id', $this->shipping_ward)->first();

        $orderData = [
            'user_id' => Auth::user()->id,
            'order_type_id' => $this->order_type_id,
            'order_status_id' => $this->order_status_id,
            'payment_method_id' => $this->payment_method_id,
            'payment_status_id' => $this->payment_status_id,
            'total_amount' => $this->total_amount,
            'discount_amount' => $this->discount_amount,
            'final_amount' => $this->final_amount,
            'order_code' => Str::uuid(),
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_email' => $this->customer_email,
            'customer_address' => $this->customer_address,
            'shipping_city' => $realCity->province_name,
            'shipping_district' => $realDistrict->district_name,
            'shipping_ward' => $realWard->wards_name,
            'shipping_detail' => $this->shipping_detail,
            'shipping_phone' => $this->shipping_phone,
            'shipping_fee' => $this->shipping_fee,
            'note' => $this->note,
        ];

        $order = Order::create($orderData);
        $order->order_code = 'MED' . str_pad($order->id, 8, '0', STR_PAD_LEFT);
        $order->save();

        foreach($this->orderItems as $orderItem) {
            $orderItemData = [
                'order_id' => $order->id,
                'product_variant_id' => $orderItem['selected_variant'],
                'quantity' => $orderItem['quantity'],
                'price' => $orderItem['price'],
                'total' => $orderItem['total'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            OrderItem::create($orderItemData);

            $variant = ProductVariant::findOrFail($orderItem['selected_variant']);
            $variant->quantity = $variant->quantity - $orderItem['quantity'];
            $variant->save();
        }

        // Log::info('['. Carbon::now()->format('d/m/Y H:i:s') .'] Đặt hàng | Đơn hàng: '. $bill->id .' - UserID: '. Auth::user()->id .' | Nội dung đơn hàng: '. json_encode($bill));

        return redirect()->route('order.index')->with('success','Tạo hóa đơn thành công');
    }

    public function render()
    {
        $addresses = Address::query()
                    ->whereHas('user', function ($query) {
                        $query->where('email', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('receiver_name', 'like', '%' . $this->search . '%')
                    ->orderBy('id', 'ASC')
                    ->get();

        $products = Product::query()
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->orderBy('id', 'ASC')
                    ->get();
        return view('livewire.admin.order.order-create', [
            'addresses' => $addresses,
            'products' => $products,
        ]);
    }
}
