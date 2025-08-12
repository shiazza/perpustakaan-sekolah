<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_list';
    protected $fillable = ['user_id', 'bc_id', 'is_fav', 'borrow_id', 'return_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function bookChild()
    {
        return $this->belongsTo(BookChild::class, 'bc_id', 'id_bc');
    }

    public function borrow()
    {
        return $this->belongsTo(Borrow::class, 'borrow_id', 'id_borrow');
    }

    public function returnBook()
    {
        return $this->belongsTo(ReturnBook::class, 'return_id', 'id_return');
    }
}
