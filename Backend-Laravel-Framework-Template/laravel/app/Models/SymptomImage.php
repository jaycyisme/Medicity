<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SymptomImage extends Model
{
    use HasFactory;
    protected $table = 'symptom_images';

    protected $fillable = [
        'appointment_id',
        'medical_record_id',
        'image_url',
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class, 'medical_record_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
