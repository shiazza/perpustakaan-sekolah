<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_reservation';
    protected $fillable = ['user_id', 'bc_id', 'reserved_at', 'expired_at', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bookChild()
    {
        return $this->belongsTo(BookChild::class, 'bc_id', 'id_bc');
    }
}
