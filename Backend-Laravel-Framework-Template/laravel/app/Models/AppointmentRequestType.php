<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentRequestType extends Model
{
    use HasFactory;
    protected $table = 'appointment_request_types';

    protected $fillable = [
        'name',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
