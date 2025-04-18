<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'sub_category_id',
        'brand_id',
        'speciality_id',
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
        'is_prescription',
    ];

    protected $casts = [
        'is_prescription' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }



    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function diseaseProducts()
    {
        return $this->hasMany(DiseaseProduct::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productFeedbacks()
    {
        return $this->hasMany(ProductFeedback::class);
    }

    public function totalQuantity() {
        return $this->variants()->sum('quantity');
    }

    public function generateUniqueSlug($name): string
    {
        $slug = Str::slug($name);
        $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function activeFeedbacks()
    {
        return $this->hasMany(ProductFeedback::class)->where('is_active', 1);
    }

    public function averageRating()
    {
        return $this->activeFeedbacks()->avg('star') ?? 0;
    }
}
