<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentStatus extends Model
{
    use HasFactory;
    protected $table = 'payment_statuses';

    protected $fillable = [
        'name',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
