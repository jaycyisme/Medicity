<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'appointments';

    protected $fillable = [
        'user_id',
        'doctor_id',
        'status_id',
        'type_id',
        'business_hour',
        'appointment_code',
        'clinic_id',

        'service_id',
        'speciality_id',
        'patient_name',
        'patient_phone',
        'patient_email',
        'patient_symptoms',
        'patient_province',
        'patient_district',
        'patient_ward',
        'patient_address_detail',
        'patient_reason_visit',
        'symtom_image_id',
        'appointment_price',
        'appointment_tax',
        'appointment_discount',
        'appointment_final_price',
        'payment_method_id',

    ];

    protected $casts = [
        'business_hour' => 'array',
    ];

    public function symptomImages()
    {
        return $this->hasMany(SymptomImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->withTrashed();
    }

    public function appointmentStatus()
    {
        return $this->belongsTo(AppointmentStatus::class, 'status_id');
    }

    public function appointmentRequestType()
    {
        return $this->belongsTo(ConsultationType::class, 'type_id');
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

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
