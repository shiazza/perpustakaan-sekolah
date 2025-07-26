<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookParent extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_bp';

    protected $fillable = [
        'title', 'writers', 'sinopsis', 'category', 'image'
    ];

    public function children()
    {
        return $this->hasMany(BookChild::class, 'bp_id', 'id_bp');
    }
}
