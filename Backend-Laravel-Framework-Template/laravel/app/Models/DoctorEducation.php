<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorEducation extends Model
{
    use HasFactory;
    protected $table = 'doctor_experiences';

    protected $fillable = [
        'doctor_id',
        'logo_url',
        'institution_name',
        'course_name',
        'start_date',
        'end_date',
        'no_of_years',
        'description',
    ];

    protected $casts = [
        'no_of_years' => 'integer',
        'start_time' => 'date',
        'end_time' => 'date',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
