<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookParents extends Model
{
    protected $table = 'book_parents';
    protected $primaryKey = 'id_bp';

    protected $fillable = [
        'title', 'writers', 'sinopsis', 'category', 'image',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(BookChildren::class, 'bp_id', 'id_bp');
    }
}
