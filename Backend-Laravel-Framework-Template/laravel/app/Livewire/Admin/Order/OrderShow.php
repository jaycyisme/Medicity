<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class OrderShow extends Component
{
    public $id;
    public $order;
    public $orderItems;

    public function mount($id) {
        $this->id = $id;
        $this->order = Order::findOrfail($id);
        $this->orderItems = OrderItem::where('order_id', $this->order->id)->get();
    }

    public function render()
    {
        return view('livewire.admin.order.order-show');
    }
}
