<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ViettelPostWard extends Model
{
    use HasFactory;
    protected $fillable = ['wards_id', 'wards_name', 'district_id'];
}
