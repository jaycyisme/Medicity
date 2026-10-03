<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PharmacyAward extends Model
{

    use HasFactory;
    protected $table = 'pharmacy_awards';

    protected $fillable = [
        'date',
        'name',
        'description',
    ];

    public function pharmacy() {
        return $this->belongsTo(Clinic::class, 'pharmacy_id');
    }
}
