<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ViettelPostDistrict extends Model
{
    use HasFactory;
    protected $fillable = ['district_id', 'district_value', 'district_name', 'province_id'];
}
