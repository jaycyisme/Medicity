<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BodyPart extends Model
{
    use HasFactory;
    protected $table = 'body_parts';

    protected $fillable = [
        'name',
        'image_url',
        'description',
    ];

    public function diseases()
    {
        return $this->hasMany(Disease::class);
    }
}
