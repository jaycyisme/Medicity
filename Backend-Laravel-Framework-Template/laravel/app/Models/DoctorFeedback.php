<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorFeedback extends Model
{
    use HasFactory;
    protected $table = 'doctor_feedbacks';

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'star',
        'title',
        'review_detail',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
