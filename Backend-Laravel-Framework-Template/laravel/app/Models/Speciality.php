<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speciality extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'specialities';

    protected $fillable = [
        'name',
        'image_url',
        'sub_image_url',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function doctorSpecialities()
    {
        return $this->hasMany(DoctorSpeciality::class);
    }

    public function doctors()
    {
        return $this->hasMany(User::class);
    }

    public function diseases()
    {
        return $this->hasMany(Disease::class);
    }
}
