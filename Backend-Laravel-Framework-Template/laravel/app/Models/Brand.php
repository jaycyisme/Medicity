<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'brands';

    protected $fillable = [
        'name',
        'image_url',
    ];

    public function products()
    {
        return $this->hasMany(Product::class)->withTrashed();
    }
}
