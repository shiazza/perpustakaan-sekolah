<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnBook extends Model
{
    use SoftDeletes;

    protected $table = 'return';
    protected $primaryKey = 'id_return';
    protected $fillable = ['date', 'Condition'];

    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'return_id', 'id_return');
    }

    public function fines()
    {
        return $this->hasMany(Fine::class, 'return_id', 'id_return');
    }
}
