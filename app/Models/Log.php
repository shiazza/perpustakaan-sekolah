<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_log';

    protected $fillable = [
        'log_msg', 'log_return', 'log_borrow', 'log_books'
    ];
}
