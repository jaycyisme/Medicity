<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\OrderType;
use App\Models\ProductVariant;
use App\Models\ViettelPostCity;
use App\Models\ViettelPostWard;
use App\Models\ViettelPostDistrict;

class OrderUpdate extends Component
{
    public $search = '';
    public $id;
    public $total_amount;
    public $discount_amount;
    public $final_amount;
    public $order_code;
    public $order_type_id;
    public $order_status_id;
    public $payment_method_id;
    public $payment_status_id;
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
    public $shipping_fee;

    public $paymentMethods;
    public $orderStatuses;
    public $orderTypes;

    public $citiesList = [];
    public $districtsList = [];
    public $wardsList = [];

    public $isOnlineOrder = false;

    public $orderItems = [];

    public $errorMessages = [];

    public function mount($id)
    {
        $this->id = $id;
        $order = Order::with('orderItems.productVariant.product')->findOrFail($id);

        $this->order_type_id = $order->order_type_id;
        $this->order_status_id = $order->order_status_id;
        $this->payment_method_id = $order->payment_method_id;
        $this->payment_status_id = $order->payment_status_id;
        $this->total_amount = $order->total_amount;
        $this->discount_amount = $order->discount_amount;
        $this->final_amount = $order->final_amount;
        $this->order_code = $order->order_code;
        $this->note = $order->note;
        $this->customer_name = $order->customer_name;
        $this->customer_phone = $order->customer_phone;
        $this->customer_email = $order->customer_email;
        $this->customer_address = $order->customer_address;
        $this->shipping_city = $order->shipping_city;
        $this->shipping_district = $order->shipping_district;
        $this->shipping_ward = $order->shipping_ward;
        $this->shipping_detail = $order->shipping_detail;
        $this->shipping_phone = $order->shipping_phone;
        $this->shipping_fee = $order->shipping_fee;

        $this->citiesList = ViettelPostCity::get();


        $this->orderItems = $order->orderItems->map(function ($orderItem) {
            $product = $orderItem->productVariant->product;
            $variants = ProductVariant::where('product_id', $product->id)
                                            ->where(function ($query) use ($orderItem) {
                                                $query->where('quantity', '>', 0)
                                                    ->orWhere('id', $orderItem->product_variant_id);
                                            })->get();
            return [
                'id' => $orderItem->id,
                'product_name' => $product->name,
                'variants' => $variants,
                'selected_variant' => $orderItem->product_variant_id,
                'quantity' => $orderItem->quantity,
                'price' => $orderItem->price,
                'total' => $orderItem->total,
            ];
        })->toArray();

        // $this->calculateTotal();
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

    public function changeOrderType($value) {
        $orderType = OrderType::findOrFail($value);
        if ($orderType->name === 'Online') {
            $this->isOnlineOrder = true;
        }else {
            $this->isOnlineOrder = false;
        }
    }

    public function addProduct($productId)
    {
        $product = Product::with('variants')->findOrFail($productId);
        $variants = ProductVariant::where('product_id', $productId)
                                        ->where('quantity', '>', 0)
                                        ->get();

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

        $variant = ProductVariant::where('id', $variantId)->first();

        if (!$variant) {
            $this->errorMessages[$index] = 'Biến thể không hợp lệ.';
            return;
        }

        $this->orderItems[$index]['selected_variant'] = $variantId;
        $this->orderItems[$index]['price'] = $variant->is_sale ? $variant->sale_price : $variant->price;

        // 🔥 Cập nhật total dựa trên quantity đã chọn
        $this->orderItems[$index]['total'] = $this->orderItems[$index]['quantity'] * $this->orderItems[$index]['price'];

        $this->calculateTotal();
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

        // ✅ Đảm bảo `total` được tính đúng với `quantity * price`
        $this->orderItems[$index]['quantity'] = $quantity;
        $this->orderItems[$index]['total'] = $quantity * $this->orderItems[$index]['price'];

        $this->calculateTotal();
    }


    public function updateTotalMoney()
    {
        // 🔥 Nếu `discount_amount` rỗng hoặc không phải số, gán giá trị 0
        $this->discount_amount = is_numeric($this->discount_amount) ? (float)$this->discount_amount : 0;

        // ✅ Đảm bảo `final_amount` đúng bằng `total_amount - discount_amount`
        $this->final_amount = max(0, $this->total_amount - $this->discount_amount);
    }

    public function calculateTotal()
    {
        $this->total_amount = array_sum(array_column($this->orderItems, 'total'));
        $this->updateTotalMoney();
    }

    public function removeProduct($index)
    {
        if (!empty($this->orderItems[$index]['id'])) {
            $orderItemId = $this->orderItems[$index]['id'];
            $orderItem = OrderItem::find($orderItemId);

            if ($orderItem) {
                $variant = $orderItem->productVariant;
                $variant->quantity += $orderItem->quantity;
                $variant->save();
                $orderItem->delete();
            }
        }
        unset($this->orderItems[$index]);
        $this->orderItems = array_values($this->orderItems);
        $this->calculateTotal();
    }

    public function updateBill()
    {
        foreach ($this->orderItems as $index => $orderItem) {
            if (empty($orderItem['selected_variant'])) {
                session()->flash('error', "Vui lòng chọn biến thể cho sản phẩm '{$orderItem['product_name']}'.");
                return;
            }
        }
        $order = Order::findOrFail($this->id);

        $realCity = ViettelPostCity::where('province_id', $this->shipping_city)->first();
        $realDistrict = ViettelPostDistrict::where('district_id', $this->shipping_district)->first();
        $realWard = ViettelPostWard::where('wards_id', $this->shipping_ward)->first();

        $order->update([
            'order_type_id' => $this->order_type_id,
            'order_status_id' => $this->order_status_id,
            'payment_method_id' => $this->payment_method_id,
            'payment_status_id' => $this->payment_status_id,
            'total_amount' => $this->total_amount,
            'discount_amount' => $this->discount_amount,
            'final_amount' => $this->final_amount,
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
        ]);

        foreach ($this->orderItems as $orderItemData) {
            $existingProduct = OrderItem::find($orderItemData['id'] ?? null);

            if ($existingProduct) {
                $previousQuantity = $existingProduct->quantity;
                $existingProduct->update([
                    'order_id' => $this->id,
                    'product_variant_id' => $orderItemData['selected_variant'],
                    'quantity' => $orderItemData['quantity'],
                ]);

                // Cập nhật lại số lượng biến thể
                $variant = ProductVariant::findOrFail($orderItemData['selected_variant']);
                $variant->quantity += $previousQuantity - $orderItemData['quantity'];
                $variant->save();
            } else {
                OrderItem::create([
                    'order_id' => $this->id,
                    'product_variant_id' => $orderItemData['selected_variant'],
                    'quantity' => $orderItemData['quantity'],
                    'price' => $orderItemData['price'],
                    'total' => $orderItemData['total'],
                ]);

                $variant = ProductVariant::findOrFail($orderItemData['selected_variant']);
                $variant->quantity -= $orderItemData['quantity'];
                $variant->save();
            }
        }
        // Log::info('['. Carbon::now()->format('d/m/Y H:i:s') .'] Đặt hàng | Đơn hàng: '. $bill->id .' - UserID: '. Auth::user()->id .' | Nội dung đơn hàng: '. json_encode($bill));

        return redirect()->route('order.index')->with('success','Hóa đơn đã được cập nhật thành công');;
    }

    public function render()
    {
        $products = Product::query()->where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->get();
        return view('livewire.admin.order.order-update', ['products' => $products]);
    }
}
