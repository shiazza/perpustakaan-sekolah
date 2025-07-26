<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_borrow';

    protected $fillable = [
        'date'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'borrow_id', 'id_borrow');
    }
}
