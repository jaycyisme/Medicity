<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = $id;
        return view('admin.order.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = $id;
        return view('admin.order.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.index')->with('success','Order is deleted successfully');
    }

    public function printOrder($orderId)
    {
        // Lấy thông tin đơn hàng từ cơ sở dữ liệu
        $order = Order::with(['orderItems', 'user', 'orderStatus'])->findOrFail($orderId);

        // Tạo PDF từ view 'pdf.order'
        $pdf = Pdf::loadView('pdf.order', compact('order'));

        // Trả về PDF để tải về (hoặc có thể sử dụng stream để hiển thị trong trình duyệt)
        return $pdf->download('order_' . $order->order_code . '.pdf');
    }
}
