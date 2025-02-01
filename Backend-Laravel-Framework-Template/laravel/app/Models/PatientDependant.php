<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientDependant extends Model
{
    use HasFactory;
    protected $table = 'patient_dependants';

    protected $fillable = [
        'patient_id',
        'image_url',
        'relationship',
        'dob',
        'gender',
        'blood_group',
        'is_active',
    ];

    protected $casts = [
        'dob' => 'date',
        'is_active' => 'boolean',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
