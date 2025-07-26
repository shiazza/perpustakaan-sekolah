<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookList extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_list';

    protected $fillable = [
        'user_id', 'bc_id', 'id_trans', 'is_favorite',
        'borrow_duration_start', 'borrow_duration_end'
    ];

    protected $casts = [
        'borrow_duration_start' => 'datetime',
        'borrow_duration_end'   => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function child()
    {
        return $this->belongsTo(BookChild::class, 'bc_id', 'id_bc');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_trans', 'id_trans');
    }
}
