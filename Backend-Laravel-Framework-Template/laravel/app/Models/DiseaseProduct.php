<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiseaseProduct extends Model
{
    use HasFactory;
    protected $table = 'disease_products';

    protected $fillable = [
        'disease_id',
        'product_id',
        'dosage',
        'instructions',
    ];

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
