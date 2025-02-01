<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    use HasFactory;
    protected $table = 'product_variants';

    protected $fillable = [
        'product_id',
        'packaging_type_id',
        'size_id',
        'color_id',
        'image_url',
        'quantity',
        'sku',
        'price',
        'is_sale',
        'sale_price',
        'sale_start_time',
        'sale_end_time',
    ];

    protected $casts = [
        'is_sale' => 'boolean',
        'sale_start_time' => 'datetime',
        'sale_end_time' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function packagingType()
    {
        return $this->belongsTo(PackagingType::class, 'packaging_type_id');
    }



    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
