<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceImage extends Model
{
    use HasFactory;
    protected $table = 'service_images';

    protected $fillable = [
        'service_id',
        'image_url',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
