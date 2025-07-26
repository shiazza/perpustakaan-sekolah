<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookChild extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_bc';

    protected $fillable = [
        'bp_id', 'ISBN', 'condition'
    ];

    public function parent()
    {
        return $this->belongsTo(BookParent::class, 'bp_id', 'id_bp');
    }

    public function bookLists()
    {
        return $this->hasMany(BookList::class, 'bc_id', 'id_bc');
    }
}
