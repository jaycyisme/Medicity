<?php

namespace App\Livewire\Patient\Invoice;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Invoice extends Component
{
    public $search = '';
    public $orderDetails = [];

    public function loadOrderDetails($orderId)
    {
        $order = Order::with('orderItems.productVariant.product', 'orderStatus', 'paymentMethod')->findOrFail($orderId);

        // Format the order details for the modal
        $this->orderDetails = [
            'order_code' => $order->order_code,
            'created_at' => $order->created_at->format('d M Y'),
            'customer_name' => $order->customer_name,
            'shipping_address' => $order->shipping_city . '-' . $order->shipping_district . '-' . $order->shipping_ward . '-' . $order->shipping_detail,
            'shipping_phone' => $order->shipping_phone,
            'payment_method' => $order->paymentMethod->name,
            'items' => $order->orderItems->map(function($item) {
                return [
                    'description' => $item->productVariant->packagingType->name . ' - ' . $item->productVariant->size->name . ' - ' . $item->productVariant->color->name,
                    'quantity' => $item->quantity,
                    'total' => $item->total,
                ];
            }),
            'subtotal' => $order->total_amount, // Assuming final amount is subtotal for now
            'discount' => $order->discount_amount,
            'final_amount' => $order->final_amount,
        ];
    }
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id) // Ensure only orders for the logged-in user
        ->when($this->search, function ($query) {
            return $query->where('order_code', 'like', '%' . $this->search . '%')
                         ->orWhere('created_at', 'like', '%' . $this->search . '%');
        })
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('livewire.patient.invoice.invoice', [
            'orders' => $orders,
        ]);
    }
}
