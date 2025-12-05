<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrows';
    protected $primaryKey = 'id_borrow';

    protected $fillable = [
        'user_id',
        'bc_id',
        'start_date',
        'end_date',
        'status',
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookChild()
    {
        return $this->belongsTo(BookChild::class, 'bc_id', 'id_bc');
    }

    public function returnTransaction()
    {
        return $this->hasOne(ReturnTransaction::class, 'borrow_id', 'id_borrow');
    }
}
