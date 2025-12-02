<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    protected $primaryKey = 'id_wishlists';

    protected $fillable = [
        'user_id',
        'bc_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookChild()
    {
        return $this->belongsTo(BookChild::class, 'bc_id', 'id_bc');
    }
}
