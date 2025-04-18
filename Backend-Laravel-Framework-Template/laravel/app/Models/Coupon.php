<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\CouponType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'code',
        'type',
        'value',
        'min_order_mount',
        'max_discount_amount',
        'usage_limit',
        'used_count',
        'start_time',
        'end_time',
        'is_active',
    ];

    protected $casts = [
        'value' => 'double',
        'min_order_mount' => 'double',
        'max_discount_amount' => 'double',
        'usage_limit' => 'integer',
        'used_count' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_active' => 'boolean'
    ];

    public function couponType(): BelongsTo
    {
        return $this->belongsTo(CouponType::class);
    }


    /**
     * Check if coupon is valid
     */
    public function isValid(): bool
    {
        $now = Carbon::now();

        return $this->is_active &&
            $now->between($this->start_time, $this->end_time) &&
            $this->used_count < $this->usage_limit;
    }

    /**
     * Calculate discount amount
     */
    public function calculateDiscount($orderAmount): float
    {
        if($orderAmount < $this->min_order_amount) {
            return 0;
        }

        $discount = $this->type === 'fixed' ? $this->value : $orderAmount * ($this->value / 100);
        return min($discount, $this->max_discount_amount);
    }

    /**
     * Increment used count
     */
    public function increamentUsage(): void
    {
        $this->increment('used_count');
    }

    /**
     * Scope a query to only include active coupons.
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to only include valid coupons.
     */
    public function scopeValid($query)
    {
        $now = Carbon::now();

        return $query->where('is_active', true)
                ->where('start_time', '<=', $now)
                ->where('end_time', '>=', $now)
                ->whereColumn('used_count', '<', 'usage_limit');
    }
}
