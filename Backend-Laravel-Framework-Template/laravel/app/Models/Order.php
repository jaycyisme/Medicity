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
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Scope a query to filter by order status.
     */
    public function scopeByOrderStatus($query, $statusId)
    {
        return $query->where('order_status_id', $statusId);
    }

    public function scopeByOrderStatusName($query, $statusName)
    {
        return $query->whereHas('orderStatus', function ($q) use ($statusName) {
            $q->where('name', $statusName);
        });
    }

    /**
     * Scope a query to filter by payment status.
     */
    public function scopeByPaymentStatus($query, $statusId)
    {
        return $query->where('payment_status_id', $statusId);
    }

    /**
     * Scope a query to filter by order type.
     */
    public function scopeByOrderType($query, $typeId)
    {
        return $query->where('order_type_id', $typeId);
    }

    /**
     * Check if order can be cancelled.
     */
    public function canBeCancelled(): bool
    {
        // Assuming 1 is pending and 2 is processing status IDs
        return in_array($this->order_status_id, [1, 2]);
    }

    /**
     * Cancel the order.
     */
    public function cancel(): bool
    {
        if (!$this->canBeCancelled()) {
            return false;
        }

        // Assuming 5 is cancelled status ID
        $this->order_status_id = 5;
        return $this->save();
    }

    /**
     * Update order status.
     */
    public function updateStatus(int $statusId): bool
    {
        // Validate if status exists
        if (!OrderStatus::where('id', $statusId)->exists()) {
            return false;
        }

        $this->order_status_id = $statusId;
        return $this->save();
    }

    /**
     * Update payment status.
     */
    public function updatePaymentStatus(int $statusId): bool
    {
        // Validate if payment status exists
        if (!PaymentStatus::where('id', $statusId)->exists()) {
            return false;
        }

        $this->payment_status_id = $statusId;
        return $this->save();
    }

    /**
     * Get formatted order total.
     */
    public function getFormattedTotalAttribute(): string
    {
        return number_format($this->final_amount, 0, ',', '.') . ' đ';
    }

    /**
     * Generate unique order code.
     */
    public static function generateOrderCode(): string
    {
        do {
            $code = 'MIXER-' . strtoupper(uniqid());
        } while (self::where('order_code', $code)->exists());

        return $code;
    }
}
