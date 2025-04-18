<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalRecord extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'medical_records';

    protected $fillable = [
        'appointment_id',
        'clinic_id',
        'service_id',
        'speciality_id',
        'medical_record_code',
        'name',
        'phone',
        'email',
        'gender',
        'dob',
        'job',
        'symptoms',
        'main_desease',
        'comorbidities',

        'province',
        'district',
        'ward',
        'address_detail',
        'dependant_role',
        'dependant_name',
        'dependant_phone',
        'temperature',
        'pulse',
        'systolic',
        'diastolic',
        'spo2',
        'bsa',
        'height',
        'weight',
        'body_mass_index',
        'previous_medical_history',
        'clinical_notes',
        'laboratory_tests',
        'advice',
        'price',
        'guarantee_paid',
        'appointment_final_price'
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function laboratoryResults()
    {
        return $this->hasMany(LaboratoryResult::class)->withTrashed();
    }
}
