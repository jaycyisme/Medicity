<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medication extends Model
{
    use HasFactory;
    protected $table = 'medications';

    protected $fillable = [
        'medical_record_id',
        'product_variant_id',
        'quantity',
        'dosage',
        'frequency',
        'duration',
        'timing',
        'instruction',
        'price',
        'total',
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class, 'medical_record_id');
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

}
