<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'message', 'seen'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }



    public function receiverProfilee()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id')->select(['id', 'name']);
    }

    public function senderProfilee()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id')->select(['id', 'name']);
    }
}
