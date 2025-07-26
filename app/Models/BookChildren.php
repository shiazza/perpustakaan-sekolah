<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookChildren extends Model
{
    protected $table = 'book_children';
    protected $primaryKey = 'id_bc';

    protected $fillable = [
        'bp_id', 'ISBN', 'condition',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(BookParents::class, 'bp_id', 'id_bp');
    }

    public function bookLists(): HasMany
    {
        return $this->hasMany(BookLists::class, 'bc_id', 'id_bc');
    }
}
