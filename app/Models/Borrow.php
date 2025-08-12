<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_borrow';
    protected $fillable = ['borrow_duration_start', 'borrow_duration_end', 'date', 'status'];

    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'borrow_id', 'id_borrow');
    }

    public function fines()
    {
        return $this->hasMany(Fine::class, 'borrow_id', 'id_borrow');
    }
}
