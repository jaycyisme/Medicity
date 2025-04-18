<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceFeedback extends Model
{
    use HasFactory;
    protected $table = 'service_feedbacks';

    protected $fillable = [
        'service_id',
        'user_id',
        'star',
        'title',
        'review',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
