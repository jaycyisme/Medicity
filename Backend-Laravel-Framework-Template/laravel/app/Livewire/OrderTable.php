<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Livewire\Component;
use Livewire\WithPagination;

class OrderTable extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public $orders_deleted;

    public function mount() {
        $this->orders_deleted = Order::onlyTrashed()->orderBy('id', 'DESC')->get();
    }

    public function updateEmployee($id, $value) {
        $bill = Order::findOrfail($id);
        $bill->employee = $value;
        $bill->save();
    }

    public function updateEmployeeOfConfirmBill($id, $value) {
        $bill = Order::findOrfail($id);
        $bill->employee = $value;
        $bill->save();
    }

    public function updateEmployeeOfPaidBill($id, $value) {
        $bill = Order::findOrfail($id);
        $bill->employee = $value;
        $bill->save();
    }

    public function updateEmployeeOfUnpaidBill($id, $value) {
        $bill = Order::findOrfail($id);
        $bill->employee = $value;
        $bill->save();
    }

    public function updateEmployeeOfWaitingBill($id, $value) {
        $bill = Order::findOrfail($id);
        $bill->employee = $value;
        $bill->save();
    }

    public function updateEmployeeOfCancelledBill($id, $value) {
        $bill = Order::findOrfail($id);
        $bill->employee = $value;
        $bill->save();
    }

    public function delete($id) {
        $bill = Order::findOrfail($id);

        $billProducts = OrderItem::where('bill_id', $bill->id)->get();
        foreach($billProducts as $billProduct) {
            $variation = ProductVariant::where('id', $billProduct->product_variation_id)->first();
            $variation->quantity += $billProduct->quantity;
            $variation->save();
        }

        // Log::info('['. Carbon::now()->format('d/m/Y H:i:s') .'] Đặt hàng | Đơn hàng: '. $bill->id .' - UserID: '. Auth::user()->id .' | Nội dung đơn hàng: '. json_encode($bill));

        $bill->delete();

        $this->orders_deleted = Order::onlyTrashed()->get();

        return redirect()->route('order.index')->with('success','Hóa đơn đã được xóa');
    }

    public function restore($id) {
        $bill = Order::withTrashed()->findOrfail($id);

        $billProducts = OrderItem::where('order_id', $bill->id)->get();
        foreach($billProducts as $billProduct) {
            $variation = ProductVariant::where('id', $billProduct->product_variant_id)->first();
            $variation->quantity -= $billProduct->quantity;
            $variation->save();
        }

        // Log::info('['. Carbon::now()->format('d/m/Y H:i:s') .'] Đặt hàng | Đơn hàng: '. $bill->id .' - UserID: '. Auth::user()->id .' | Nội dung đơn hàng: '. json_encode($bill));

        $bill->restore();


        return redirect()->route('order.index')->with('success','Hóa đơn đã được restore thành công');
    }

    public function forceDelete($id) {
        $bill = Order::withTrashed()->findOrfail($id);

        // Log::info('['. Carbon::now()->format('d/m/Y H:i:s') .'] Đặt hàng | Đơn hàng: '. $bill->id .' - UserID: '. Auth::user()->id .' | Nội dung đơn hàng: '. json_encode($bill));

        $bill->forceDelete();

        return redirect()->route('order.index')->with('success','Hóa đơn đã được xóa vĩnh viễn');
    }

    public function render()
    {
        $totalOrdersCount = Order::count();
        $pendingOrdersCount = Order::byOrderStatusName('pending')->count();
        $processingOrdersCount = Order::byOrderStatusName('processing')->count();
        $shippedOrdersCount = Order::byOrderStatusName('shipped')->count();
        $deliveredOrdersCount = Order::byOrderStatusName('delivered')->count();
        $cancelledOrdersCount = Order::byOrderStatusName('cancelled')->count();
        $refundedOrdersCount = Order::byOrderStatusName('refunded')->count();

        $ordersAll = Order::whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
        })
        ->orWhereHas('paymentMethod', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orWhere('created_at', 'like', '%' . $this->search . '%')
        ->orWhere('order_code', 'like', '%' . $this->search . '%')
        ->orWhere('shipping_phone', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(10);
        $ordersPending = Order::byOrderStatusName('pending')
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
        $ordersProcessing = Order::byOrderStatusName('processing')
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
        $ordersShipped = Order::byOrderStatusName('shipped')
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
        $ordersDelivered = Order::byOrderStatusName('delivered')
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
        $ordersCancelled = Order::byOrderStatusName('cancelled')
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
        $ordersRefunded = Order::byOrderStatusName('refunded')
                                ->orderBy('id', 'DESC')
                                ->paginate(10);



        return view('livewire.order-table', [
            'totalOrdersCount' => $totalOrdersCount,
            'pendingOrdersCount' => $pendingOrdersCount,
            'processingOrdersCount' => $processingOrdersCount,
            'shippedOrdersCount' => $shippedOrdersCount,
            'deliveredOrdersCount' => $deliveredOrdersCount,
            'cancelledOrdersCount' => $cancelledOrdersCount,
            'refundedOrdersCount' => $refundedOrdersCount,

            'ordersAll' => $ordersAll,
            'ordersPending' => $ordersPending,
            'ordersProcessing' => $ordersProcessing,
            'ordersShipped' => $ordersShipped,
            'ordersDelivered' => $ordersDelivered,
            'ordersCancelled' => $ordersCancelled,
            'ordersRefunded' => $ordersRefunded,

        ]);
    }
}
