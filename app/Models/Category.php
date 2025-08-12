<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_cate';
    protected $fillable = ['name'];

    public function booksParent()
    {
        return $this->hasMany(BookParent::class, 'category_id', 'id_cate');
    }
}
