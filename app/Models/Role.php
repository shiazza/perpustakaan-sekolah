<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_role';

    protected $fillable = ['role'];

    public function users()
    {
        return $this->hasMany(User::class, 'role', 'id_role');
    }
}
