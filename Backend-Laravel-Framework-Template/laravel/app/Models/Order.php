<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total_amount',
        'discount_amount',
        'final_amount',
        'order_code',
        'order_type_id',
        'order_status_id',
        'payment_method_id',
        'payment_status_id',
        'note',
        'employee',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'shipping_city',
        'shipping_district',
        'shipping_ward',
        'shipping_detail',
        'shipping_phone',
        'shipping_fee',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderType()
    {
        return $this->belongsTo(OrderType::class, 'order_type_id');
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function paymentStatus()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }



    public function orderItems()
    {
        return $this->hasMany(OrderItem::class)->withTrashed();
    }
}
