<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'addresses';

    protected $fillable = [
        'name',
        'sub_category_id',
        'brand_id',
        'speciality_id',
        'color_id',
        'size_id',
        'tag',
        'slug',
        'base_price',
        'description',
        'ingredient',
        'indication',
        'precaution',
        'usage_instruction',
        'manufacturing_info',
        'faqs',
        'thumbnail',
        'size_image',
        'is_prescription',
    ];

    protected $casts = [
        'is_prescription' => 'boolean',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }



    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class)->withTrashed();
    }

    public function diseaseProducts()
    {
        return $this->hasMany(DiseaseProduct::class)->withTrashed();
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class)->withTrashed();
    }

    public function productFeedbacks()
    {
        return $this->hasMany(ProductFeedback::class)->withTrashed();
    }
}
