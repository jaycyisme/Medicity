<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorExperience extends Model
{
    use HasFactory;
    protected $table = 'doctor_experiences';

    protected $fillable = [
        'doctor_id',
        'hospital_name',
        'hospital_image_url',
        'year_of_experience',
        'location',
        'specialities',
        'start_time',
        'end_time',
        'description',
    ];

    protected $casts = [
        'specialities' => 'array',
        'start_time' => 'date',
        'end_time' => 'date',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
