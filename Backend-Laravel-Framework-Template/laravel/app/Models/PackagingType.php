<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackagingType extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'packaging_types';

    protected $fillable = [
        'name',
    ];

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
