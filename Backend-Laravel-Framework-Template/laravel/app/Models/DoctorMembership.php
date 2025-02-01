<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorMembership extends Model
{
    use HasFactory;
    protected $table = 'doctor_memberships';

    protected $fillable = [
        'doctor_id',
        'title',
        'description',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
