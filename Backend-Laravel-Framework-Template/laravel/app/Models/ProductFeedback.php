<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductFeedback extends Model
{
    use HasFactory;
    protected $table = 'product_feedbacks';

    protected $fillable = [
        'user_id',
        'product_id',
        'star',
        'title',
        'review',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
