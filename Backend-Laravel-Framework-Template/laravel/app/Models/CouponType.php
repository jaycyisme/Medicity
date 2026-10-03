<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CouponType extends Model
{
    use HasFactory;
    protected $table = 'coupon_types';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }
}
