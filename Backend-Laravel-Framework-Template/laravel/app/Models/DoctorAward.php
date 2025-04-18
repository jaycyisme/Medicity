<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorAward extends Model
{
    use HasFactory;
    protected $table = 'doctor_awards';

    protected $fillable = [
        'doctor_id',
        'name',
        'year',
        'description',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
