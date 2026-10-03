<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ViettelPostCity extends Model
{
    use HasFactory;
    protected $fillable = ['province_id', 'province_code', 'province_name'];
}
