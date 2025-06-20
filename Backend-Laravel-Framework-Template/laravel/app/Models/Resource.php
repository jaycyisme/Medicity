<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;
    protected $table = 'resources';

    protected $fillable = [
        'url',
        'title',
        'description',
    ];
}
