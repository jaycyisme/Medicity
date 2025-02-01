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
        'appointment_status_id',
        'appointment_request_type_id',
        'business_hour',
    ];

    protected $casts = [
        'business_hour' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function appointmentStatus()
    {
        return $this->belongsTo(AppointmentStatus::class, 'appointment_status_id');
    }

    public function appointmentRequestType()
    {
        return $this->belongsTo(AppointmentRequestType::class, 'appointment_request_type_id');
    }
}
