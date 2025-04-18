<?php

namespace App\Livewire\Medicity\Cart;

use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use Livewire\Component;
use App\Models\CouponType;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\OrderType;
use App\Models\PackagingType;
use Illuminate\Support\Str;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Models\ProductVariant;
use App\Models\ViettelPostCity;
use App\Models\ViettelPostWard;
use App\Models\ViettelPostDistrict;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $cartItem;
    public $total_money;
    public $total_amount;
    // public $discount_amount;
    public $addresses;
    public $selectedAddressId;

    public $citiesList = [];
    public $districtsList = [];
    public $wardsList = [];
    public $isOpenAddNew = false;

    public $phone;
    public $receiver_name;
    public $address_province = null;
    public $address_district = null;
    public $address_ward = null;
    public $address_detail;

    public $coupon_code;
    public $discount = 0;
    public $couponApplied = false;

    public function mount() {
        $this->cartItem = session()->get('cart', []);
        // dd($this->cartItem);
        $this->calculateTotalMoney();
        if(Auth::user()) {
            $this->addresses = Address::where('user_id', Auth::user()->id)->get();
        }else {
            return redirect()->route('login');
        }

        if($this->addresses->count() > 0) {
            $this->selectedAddressId = Address::where('user_id', Auth::user()->id)->first()->id;
        }
        $this->citiesList = ViettelPostCity::get();
    }

    public function increaseQuantity($index)
    {
        if (isset($this->cartItem[$index])) {
            $this->cartItem[$index]['quantity']++;
            $cart = session()->get('cart', []);
            if(isset($cart[$index])) {
                $cart[$index]['quantity'] = $this->cartItem[$index]['quantity'];
                $cart[$index]['total_price'] = $cart[$index]['quantity'] * $cart[$index]['price'];
            }

        session()->put('cart', $cart);
        $this->cartItem = $cart;
        $this->calculateTotalMoney();
        }
    }

    public function decreaseQuantity($index)
    {
        if (isset($this->cartItem[$index]) && $this->cartItem[$index]['quantity'] > 1) {
            $this->cartItem[$index]['quantity']--;
            $cart = session()->get('cart', []);
            if(isset($cart[$index])) {
                $cart[$index]['quantity'] = $this->cartItem[$index]['quantity'];
                $cart[$index]['total_price'] = $cart[$index]['quantity'] * $cart[$index]['price'];
            }

            session()->put('cart', $cart);
            $this->cartItem = $cart;
            $this->calculateTotalMoney();
            }
    }

    public function updateQuantityProduct($index, $quantity){
        if(!$quantity) {
            return redirect()->route('cart')->with('error','Product quantity not entered');
        }
        if($quantity < 1) {
            return redirect()->route('cart')->with('error','Product quantity must be greater than 0');
        }
        $variation = ProductVariant::findOrfail($index);
        if($quantity>$variation->quantity) {
            return redirect()->route('cart')->with('error','The product has exceeded the limited quantity.');
        }

        $cart = session()->get('cart', []);
        if(isset($cart[$index])) {
            $cart[$index]['quantity'] = $quantity;
            $cart[$index]['total_price'] = $cart[$index]['quantity'] * $cart[$index]['price'];
        }

        session()->put('cart', $cart);
        $this->cartItem = $cart;
        $this->calculateTotalMoney();
    }

    public function calculateTotalMoney() {
        $total = 0;
        foreach ($this->cartItem as $item) {
            $total += $item['total_price'];
        }
        $this->total_amount = $total;
        $total -= $this->discount;
        $this->total_money = $total;
        if($this->total_money < 0) {
            $this->total_money = 0;
        }
    }

    public function removeProductFromCart($index) {
        $cart = session()->get('cart', []);

        if(isset($cart[$index])) {
            unset($cart[$index]);
        }

        session()->put('cart', $cart);

        $this->cartItem = $cart;
        $this->calculateTotalMoney();
    }

    public function applyCoupon()
    {
        if ($this->couponApplied) {
            return session()->flash('coupon_error', 'Coupon code has been applied. Cannot be reapplied.');
        }

        $coupon = Coupon::where('code', $this->coupon_code)->where('is_active', true)->first();
        if (!$coupon) {
            return session()->flash('coupon_error', 'Coupon code is invalid or has been disabled.');
        }

        // Kiểm tra thời gian hiệu lực của coupon
        if ($coupon->start_time > now()) {
            return session()->flash('coupon_error', 'The coupon code has not expired yet.');
        }

        if ($coupon->end_time < now()) {
            return session()->flash('coupon_error', 'Coupon code has expired.');
        }

        // Kiểm tra số lần sử dụng còn lại
        if ($coupon->used_count >= $coupon->usage_limit) {
            return session()->flash('coupon_error', 'Coupon code has been used up.');
        }

        // Kiểm tra tổng tiền đơn hàng có đủ điều kiện áp dụng không
        if ($this->total_money < $coupon->min_order_mount) {
            return session()->flash('coupon_error', "Order must have total value of at least {$coupon->min_order_mount}$ to apply code.");
        }

        // Lấy loại mã giảm giá (percentage hoặc fixed)
        $coupon_type = CouponType::find($coupon->coupon_type_id);

        if (!$coupon_type) {
            return session()->flash('coupon_error', 'Invalid coupon code type.');
        }

        // Tính giảm giá
        if ($coupon_type->name === 'percentage') {
            $this->discount = ($this->total_money * $coupon->value) / 100;
        } elseif ($coupon_type->name === 'fixed') {
            $this->discount = $coupon->value;
        }

        // Đảm bảo giảm giá không vượt quá mức tối đa
        if ($this->discount > $coupon->max_discount_amount) {
            $this->discount = $coupon->max_discount_amount;
        }

        // Trừ giảm giá vào tổng tiền
        $this->calculateTotalMoney();

        // Cập nhật session và trạng thái coupon
        session()->put('discount', $this->discount);
        session()->put('coupon_code', $this->coupon_code);
        $this->couponApplied = true;

        // Cập nhật số lần sử dụng mã
        $coupon->increment('used_count');

        session()->flash('coupon_success', 'Coupon code has been applied successfully.');
    }

    public function chooseAddress($addressId) {
        $this->selectedAddressId = $addressId;
    }

    public function createAddress() {
        $validated = $this->validate([
            'receiver_name' => 'required',
            'phone' => 'required',
            'address_province' => 'required',
            'address_district' => 'required',
            'address_ward' => 'required',
            'address_detail' => 'required',
        ]);

        $realCity = ViettelPostCity::where('province_id', $this->address_province)->first();
        $realDistrict = ViettelPostDistrict::where('district_id', $this->address_district)->first();
        $realWard = ViettelPostWard::where('wards_id', $this->address_ward)->first();

        $address = Address::create([
            'phone' => $this->phone,
            'receiver_name' => $this->receiver_name,
            'city' => $realCity->province_name,
            'district' => $realDistrict->district_name,
            'ward' => $realWard->wards_name,
            'address_detail' => $this->address_detail,
            'user_id' => Auth::user()->id,
        ]);

        $address = Address::findOrfail($address->id);

        $this->selectedAddressId = $address->id;
        $this->addresses = Address::where('user_id', Auth::user()->id)->get();
        $this->isOpenAddNew = false;
    }

    public function deleteAddress($addressId) {
        $address = Address::findOrfail($addressId);
        $address->delete();
        $this->addresses = Address::where('user_id', Auth::user()->id)->get();
    }

    public function checkout() {
        if($this->selectedAddressId == null) {
            return redirect()->route('cart')->with('error', 'Enter your address.');
        }

        if (empty($this->cartItem) || count($this->cartItem) === 0) {
            return redirect()->route('cart')->with('error', 'There are no products in the cart.');
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total_amount = $this->total_amount;
        $order->discount_amount = $this->discount;
        $order->final_amount = $this->total_money;

        $orderStatus = OrderStatus::where('name', 'pending')->first();
        $order->order_status_id = $orderStatus->id;
        $orderType = OrderType::where('name', 'Online')->first();
        $order->order_type_id = $orderType->id;
        $order->order_code = Str::uuid();

        $paymentMethod = PaymentMethod::where('name', 'Cash on Delivery')->first();
        $order->payment_method_id = $paymentMethod->id;
        $paymentStatus = PaymentStatus::where('name', 'pending')->first();
        $order->payment_status_id = $paymentStatus->id;

        $address = Address::findOrFail($this->selectedAddressId);
        if (!$address->city || !$address->district || !$address->ward) {
            return redirect()->route('cart')->with('error', 'Invalid shipping address. Please check again.');
        }
        $order->customer_name = $address->receiver_name;
        $order->customer_phone = $address->phone;
        $order->customer_email = Auth::user()->email;
        $order->customer_address = $address->address_detail;
        $order->shipping_city = $address->city;
        $order->shipping_district = $address->district;
        $order->shipping_ward = $address->ward;
        $order->shipping_detail = $address->address_detail;
        $order->shipping_phone = $address->phone;
        $order->save();

        $order->order_code = 'MED' . str_pad($order->id, 8, '0', STR_PAD_LEFT);
        $order->save();


        foreach ($this->cartItem as $item) {
            $variant = ProductVariant::findOrFail($item['product_variant_id']);

            if ($variant->quantity < $item['quantity']) {
                return session()->flash('error', 'Product out of stock or insufficient quantity.');
            }

            $variant->decrement('quantity', $item['quantity']);

            OrderItem::create([
                'order_id' => $order->id,
                'product_variant_id' => $variant->id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $item['total_price'],
            ]);
        }

        // session()->put('selected_address_id', $order->address_id);
        session()->put('order_id', $order->id);
        session()->put('discount', $this->discount);
        session()->put('coupon_code', $this->coupon_code);

        // session()->forget('cart');
        // $this->cartItem = [];

        // Log::info('['. Carbon::now()->format('d/m/Y H:i:s') .'] Đặt hàng | Đơn hàng: '. $bill->id .' - UserID: '. Auth::user()->id .' | Nội dung đơn hàng: '. json_encode($bill));


        return redirect()->route('checkout')->with('success', 'Order created successfully!');
    }

    public function onChangeCity()
    {
        if(isset($this->address_province)) {
            $this->districtsList = ViettelPostDistrict::where('province_id', '=', $this->address_province)->get();
        }
    }

    public function onChangeDistrict()
    {
        if(isset($this->address_district)) {
            $this->wardsList = ViettelPostWard::where('district_id', '=', $this->address_district)->get();
        }
    }

    public function clickAddNewAddress()
    {
        $this->isOpenAddNew = true;
    }

    public function clickCancelNewAddress()
    {
        $this->isOpenAddNew = false;
    }

    public function render()
    {
        return view('livewire.medicity.cart.cart', [
            'citiesList' => $this->citiesList,
            'districtsList' => $this->districtsList,
            'wardsList' => $this->wardsList,
            'isAddNew' => $this->isOpenAddNew
        ]);
    }
}
