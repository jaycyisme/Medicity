<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'payment_methods';

    protected $fillable = [
        'name',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
