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
        'phone_number',
        'image_url',
        'address_detail',
        'coordinates',
        'about_me',
        'business_hour',
    ];

    protected $casts = [
        'business_hour' => 'array',
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function doctorClinics()
    {
        return $this->hasMany(DoctorClinic::class);
    }

    public function clinicImages()
    {
        return $this->hasMany(ClinicImage::class);
    }

    public function medicalRecord()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function pharmacyReviews()
    {
        return $this->hasMany(PharmacyReview::class, 'pharmacy_id');
    }

    public function pharmacyAward()
    {
        return $this->hasMany(PharmacyAward::class, 'pharmacy_id');
    }
}
