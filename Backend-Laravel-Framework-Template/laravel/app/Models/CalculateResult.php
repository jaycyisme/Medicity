<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CalculateResult extends Model
{
    use HasFactory;
    protected $table = 'calculate_results';

    protected $fillable = [
        'user_id',
        'result',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
