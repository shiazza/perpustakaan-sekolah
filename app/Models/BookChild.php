<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookChild extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_bc';
    protected $fillable = ['bp_id', 'ISBN', 'Condition', 'Status'];

    public function parentBook()
    {
        return $this->belongsTo(BookParent::class, 'bp_id', 'id_bp');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'bc_id', 'id_bc');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'bc_id', 'id_bc');
    }
}
