<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClinicImage extends Model
{
    use HasFactory;
    protected $table = 'clinic_images';

    protected $fillable = [
        'clinic_id',
        'image_url',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id')->withTrashed();
    }
}
