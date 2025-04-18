<?php

namespace App\Livewire\Medicity\Checkout;

use App\Models\Order;
use App\Models\Address;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\OrderType;
use App\Models\OrderStatus;
use Illuminate\Support\Str;
use App\Models\PaymentMethod;
use App\Models\PaymentStatus;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $cartItem;
    public $total_price;
    public $total_money;
    public $order_code;
    public $discount;
    public $address;
    public $paymentMethods;
    public $selectedPaymentMethod;
    public $qrCodeUrl = null;
    public $order;
    public $addresses;

    public function mount()
    {
        if (!Auth::user()) {
            return redirect()->route('client-login');
        }

        // Kiểm tra xem có đơn hàng "Mua ngay" hay không
        if (session()->has('buy_now')) {
            $buyNowItem = session()->get('buy_now');

            $orderStatus = OrderStatus::where('name', 'pending')->first();
            $orderType = OrderType::where('name', 'Online')->first();
            $paymentMethod = PaymentMethod::where('name', 'Cash on Delivery')->first();
            $paymentStatus = PaymentStatus::where('name', 'pending')->first();
            $address = Address::where('user_id', Auth::user()->id)->first();
            if(!$address) {
                return redirect()->route('cart')->with('error', 'No shipping address yet.');
            }
            // Tạo đơn hàng tạm thời
            $this->order = Order::create([
                'user_id' => Auth::user()->id,
                'order_status_id' => $orderStatus->id, // Đang xử lý
                'order_type_id' => $orderType->id, // Đang xử lý
                'order_code' => Str::uuid(), // Đang xử lý
                'payment_status_id' => $paymentStatus->id, // Chưa thanh toán
                'payment_method_id' => $paymentMethod->id, // Chưa chọn phương thức thanh toán
                'total_amount' => $buyNowItem['total_price'],
                'final_amount' => $buyNowItem['total_price'],
                'customer_name' => $address->receiver_name,
                'customer_phone' => $address->phone,
                'customer_email' => Auth::user()->email,
                'customer_address' => $address->address_detail,
                'shipping_city' => $address->city,
                'shipping_district' => $address->district,
                'shipping_ward' => $address->ward,
                'shipping_detail' => $address->address_detail,
                'shipping_phone' => $address->phone,
            ]);

            $this->order->order_code = 'MED' . str_pad($this->order->id, 8, '0', STR_PAD_LEFT);
            $this->order->save();

            // Tạo sản phẩm trong đơn hàng
            OrderItem::create([
                'order_id' => $this->order->id,
                'product_variant_id' => $buyNowItem['product_variant_id'],
                'quantity' => $buyNowItem['quantity'],
                'price' => $buyNowItem['price'],
                'total' => $buyNowItem['total_price'],
            ]);

            // Đưa sản phẩm vào danh sách checkout
            $this->cartItem = [$buyNowItem];
            $this->total_price = $buyNowItem['total_price'];
            $this->total_money = $buyNowItem['total_price'];

            session()->forget('buy_now'); // Xóa session sau khi sử dụng
        } else {
            // Nếu không phải "Mua ngay", xử lý như đơn hàng thông thường
            $orderId = session()->get('order_id');
            if ($orderId) {
                $this->order = Order::find($orderId);
            }

            if (!$this->order) {
                return redirect()->route('cart')->with('error', 'Order not found.');
            }

            // Lấy danh sách sản phẩm từ order
            $this->cartItem = $this->order->orderItems->map(function ($item) {
                return [
                    'product_id' => $item->productVariant->product_id,
                    'product_name' => $item->productVariant->product->name,
                    'size' => $item->productVariant->size ? $item->productVariant->size->name : null,
                    'color' => $item->productVariant->color ? $item->productVariant->color->name : null,
                    'packaging' => $item->productVariant->packagingType ? $item->productVariant->packagingType->name : null,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total_price' => $item->total,
                    'image' => $item->productVariant->image_url,
                    'order_code' => $item->order->order_code,
                ];
            })->toArray();

            $this->total_price = collect($this->cartItem)->sum('total_price');
            $this->total_money = max($this->total_price - $this->discount, 0);
        }

        $this->addresses = Address::where('user_id', Auth::user()->id)->get();
        $this->address = $this->addresses->first();

        $this->paymentMethods = PaymentMethod::all();
        $this->selectedPaymentMethod = PaymentMethod::where('name', 'Cash on Delivery')->first()->id;

        $this->handlePaymentMethodChange($this->selectedPaymentMethod);
    }

    public function calculateTotalPrice()
    {
        $this->total_price = collect($this->cartItem)->sum('total_price');
    }

    public function calculateTotalMoney()
    {
        $this->total_money = max($this->total_price - $this->discount, 0);
    }

    public function handlePaymentMethodChange($value)
    {
        $this->selectedPaymentMethod = $value;
        $paymentMethod = PaymentMethod::find($value);

        if ($paymentMethod && $paymentMethod->name === 'Transfer') {
            $bankId = 'VCB';
            $accountNo = '1025314748';
            $template = 'compact2';
            $amount = $this->total_money;
            $description = $this->order_code ?? 'no_code';
            $accountName = 'ĐỖ QUỐC TUẤN';

            $this->qrCodeUrl = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-{$template}.png?amount={$amount}&addInfo={$description}&accountName={$accountName}";
        } else {
            $this->qrCodeUrl = null;
        }
    }

    public function checkout()
    {
        if (!$this->address) {
            return redirect()->route('cart')->with('error', 'Please select shipping address.');
        }

        if (empty($this->cartItem)) {
            return redirect()->route('cart')->with('error', 'There are no products in the cart.');
        }

        $this->order->update([
            'customer_name' => $this->address->receiver_name,
            'customer_phone' => $this->address->phone,
            'customer_address' => $this->address->address_detail,
            'shipping_city' => $this->address->city,
            'shipping_district' => $this->address->district,
            'shipping_ward' => $this->address->ward,
            'shipping_detail' => $this->address->address_detail,
            'shipping_phone' => $this->address->phone,
            // 'total_amount' => $this->total_price,
            // 'discount_amount' => $this->discount,
            // 'final_amount' => $this->total_money,
            'payment_method_id' => $this->selectedPaymentMethod,
            'order_status_id' => 2, // Đơn hàng đã xác nhận
            'payment_status_id' => 2, // Thanh toán thành công
        ]);

        session()->forget(['cart', 'order_id', 'discount']);

        return redirect()->route('index')->with('success', 'Payment successful!');
    }

    public function addAddress($addressId)
    {
        $this->address = Address::findOrfail($addressId);
    }


    public function render()
    {
        return view('livewire.medicity.checkout.checkout');
    }
}
