<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PharmacyReview extends Model
{

    use HasFactory;
    protected $table = 'pharmacy_reviews';

    protected $fillable = [
        'pharmacy_id',
        'user_id',
        'star',
        'title',
        'review',
        'is_active',
    ];

    public function pharmacy() {
        return $this->belongsTo(Clinic::class, 'pharmacy_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
