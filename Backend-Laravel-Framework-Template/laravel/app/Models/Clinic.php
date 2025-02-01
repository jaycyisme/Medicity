<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clinic extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'clinics';

    protected $fillable = [
        'name',
        'sub_name',
        'address_detail',
        'phone',
        'city',
        'district',
        'ward',
        'coordinates',
        'business_hour',
        'image_url',
    ];

    protected $casts = [
        'business_hour' => 'array',
    ];

    public function services()
    {
        return $this->hasMany(Service::class)->withTrashed();
    }

    public function doctorClinics()
    {
        return $this->hasMany(DoctorClinic::class)->withTrashed();
    }

    public function clinicImages()
    {
        return $this->hasMany(ClinicImage::class)->withTrashed();
    }

    public function medicalRecord()
    {
        return $this->hasMany(MedicalRecord::class)->withTrashed();
    }
}
