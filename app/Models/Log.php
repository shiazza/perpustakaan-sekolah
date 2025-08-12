<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
   use SoftDeletes;

    protected $primaryKey = 'id_log';
    protected $fillable = ['log_msg', 'log_return', 'log_borrow', 'log_books', 'user_id', 'log_time'];

    public function message()
    {
        return $this->belongsTo(Message::class, 'log_msg', 'id_message');
    }

    public function returnBook()
    {
        return $this->belongsTo(ReturnBook::class, 'log_return', 'id_return');
    }

    public function borrow()
    {
        return $this->belongsTo(Borrow::class, 'log_borrow', 'id_borrow');
    }

    public function bookChild()
    {
        return $this->belongsTo(BookChild::class, 'log_books', 'id_bc');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
