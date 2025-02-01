<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorInsurance extends Model
{
    use HasFactory;
    protected $table = 'doctor_insurances';

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'doctor_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
