<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false; // karena UUID

    protected $fillable = [
        'id', 'id_role', 'name', 'email', 'password', 'NISN', 'number', 'address', 'NIK', 'gender', 'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roleData()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'user_id', 'id');
    }

    public function messagesSent()
    {
        return $this->hasMany(Message::class, 'sender_id', 'id');
    }

    public function messagesReceived()
    {
        return $this->hasMany(Message::class, 'receiver_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id', 'id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'user_id', 'id');
    }
}
