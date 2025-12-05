<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnTransaction extends Model
{
    protected $table = 'return_transactions';
    protected $primaryKey = 'id_return';

    protected $fillable = [
        'borrow_id',
        'bc_id',
        'date',
        'condition',
        'proof_image',
        'fine_value',
        'fine_status',
        'description',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function borrow()
    {
        return $this->belongsTo(Borrow::class, 'borrow_id', 'id_borrow');
    }

    public function bookChild()
    {
        return $this->belongsTo(BookChild::class, 'bc_id', 'id_bc');
    }
}
