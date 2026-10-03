<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FavouriteDoctor extends Model
{
    use HasFactory;
    protected $table = 'favourite_doctors';

    protected $fillable = [
        'user_id',
        'doctor_id',
    ];

    public function doctorFavourites()
    {
        return $this->hasMany(DoctorFavourite::class, 'doctor_id');
    }

    public function patientFavourites()
    {
        return $this->hasMany(DoctorFavourite::class, 'patient_id');
    }
}
