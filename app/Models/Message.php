<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_message';
    protected $fillable = ['sender_id', 'receiver_id', 'message', 'sent_at'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'log_msg', 'id_message');
    }
}
