<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TargetGroup extends Model
{
    use HasFactory;
    protected $table = 'target_groups';

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
