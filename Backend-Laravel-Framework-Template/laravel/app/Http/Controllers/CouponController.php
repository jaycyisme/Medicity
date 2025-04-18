<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponType;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $couponTypes = CouponType::all();
        return view('admin.coupon.create', compact('couponTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:coupons,code',
            'couponTypeId' => 'required|exists:coupon_types,id',
            'value' => 'required|numeric|min:0',
            'min_order_mount' => 'required|numeric|min:0',
            'max_discount_amount' => 'required|numeric|min:0',
            'usage_limit' => 'required|integer|min:1',
            'start_time' => 'required|date|after_or_equal:today',
            'end_time' => 'required|date|after:start_time',
        ]);

        $coupon = new Coupon();
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->coupon_type_id = $request->couponTypeId;
        $coupon->value = $request->value;
        $coupon->min_order_mount = $request->min_order_mount;
        $coupon->max_discount_amount = $request->max_discount_amount;
        $coupon->usage_limit = $request->usage_limit;
        $coupon->start_time = $request->start_time;
        $coupon->end_time = $request->end_time;

        $coupon->save();
        return redirect()->route('coupon.index')->with('success','Mã giảm giá đã được tạo thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $couponTypes = CouponType::all();
        return view('admin.coupon.edit', compact('coupon', 'couponTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:coupons,code,' . $id,
            'couponTypeId' => 'required|exists:coupon_types,id',
            'value' => 'required|numeric|min:0',
            'min_order_mount' => 'required|numeric|min:0',
            'max_discount_amount' => 'required|numeric|min:0',
            'usage_limit' => 'required|integer|min:1',
            'start_time' => 'required|date|after_or_equal:today',
            'end_time' => 'required|date|after:start_time',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->coupon_type_id = $request->couponTypeId;
        $coupon->value = $request->value;
        $coupon->min_order_mount = $request->min_order_mount;
        $coupon->max_discount_amount = $request->max_discount_amount;
        $coupon->usage_limit = $request->usage_limit;
        $coupon->start_time = $request->start_time;
        $coupon->end_time = $request->end_time;

        $coupon->save();
        return redirect()->route('coupon.index')->with('success','Mã giảm giá đã được chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect()->route('coupon.index')->with('success','Mã giảm giá đã được xóa thành công');
    }
}
