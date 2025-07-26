<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnBook extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'return';
    protected $primaryKey = 'id_return';

    protected $fillable = [
        'date'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'return_id', 'id_return');
    }
}
