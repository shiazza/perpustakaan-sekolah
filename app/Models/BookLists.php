<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookLists extends Model
{
    protected $table = 'book_list';
    protected $primaryKey = 'id_list';

    protected $fillable = [
        'user_id', 'bc_id', 'id_trans', 'is_favorite',
        'borrow_duration_start', 'borrow_duration_end',
    ];

    protected $casts = [
        'borrow_duration_start' => 'datetime',
        'borrow_duration_end'   => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function child(): BelongsTo
    {
        return $this->belongsTo(BookChildren::class, 'bc_id', 'id_bc');
    }

    // public function transaction(): BelongsTo
    // {
    //     // ganti App\Models\Transaction jika nama / pk berbeda
    //     return $this->belongsTo(Transaction::class, 'id_trans');
    // }

    /** Helper untuk boolean-ish favorite */
    public function getIsFavoriteAttribute($value): bool
    {
        return $value === 'yes';
    }

    public function setIsFavoriteAttribute($value): void
    {
        $this->attributes['is_favorite'] = $value ? 'yes' : 'no';
    }
}
