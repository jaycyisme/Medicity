<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $table = 'medical_records';

    protected $fillable = [
        'patient_id',
        'clinic_id',
        'title',
        'symptoms',
        'report',
    ];

    protected $casts = [
        'symptoms' => 'array',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
}
