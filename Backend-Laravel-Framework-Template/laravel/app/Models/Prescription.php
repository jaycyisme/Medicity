<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prescription extends Model
{
    use HasFactory;
    protected $table = 'prescriptions';

    protected $fillable = [
        'image_url',
        'customer_name',
        'phone',
        'note',
        'is_accept',
    ];

    protected $casts = [
        'is_accept' => 'boolean',
    ];
}
