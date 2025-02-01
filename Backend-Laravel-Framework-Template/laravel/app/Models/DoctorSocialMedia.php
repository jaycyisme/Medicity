<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorSocialMedia extends Model
{
    use HasFactory;
    protected $table = 'doctor_social_medias';

    protected $fillable = [
        'doctor_id',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'zalo_url',
        'linkedin_url',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
