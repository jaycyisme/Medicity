<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = [
        'thumbnail',
        'name',
        'duration',
        'price',
        'description',
        'clinic_id',
        'speciality_id'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }


    public function doctorServices()
    {
        return $this->hasMany(DoctorService::class);
    }

    public function serviceImages()
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function serviceFeedbacks()
    {
        return $this->hasMany(ServiceFeedback::class);
    }
}
