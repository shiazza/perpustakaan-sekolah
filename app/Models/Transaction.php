<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_trans';

    protected $fillable = [
        'borrow_id', 'return_id'
    ];

    public function borrow()
    {
        return $this->belongsTo(Borrow::class, 'borrow_id', 'id_borrow');
    }

    public function returnBook()
    {
        return $this->belongsTo(ReturnBook::class, 'return_id', 'id_return');
    }

    public function bookLists()
    {
        return $this->hasMany(BookList::class, 'id_trans', 'id_trans');
    }
}
