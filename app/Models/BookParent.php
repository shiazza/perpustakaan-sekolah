<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookParent extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_bp';
    protected $fillable = ['title', 'writers', 'sinopsis', 'category_id', 'image', 'publisher'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id_cate');
    }

    public function children()
    {
        return $this->hasMany(BookChild::class, 'bp_id', 'id_bp');
    }
}
