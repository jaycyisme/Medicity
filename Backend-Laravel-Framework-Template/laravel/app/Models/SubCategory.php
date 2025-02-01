<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sub_categories';

    protected $fillable = [
        'category_id',
        'name',
        'image_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }



    public function products()
    {
        return $this->hasMany(Product::class)->withTrashed();
    }
}
