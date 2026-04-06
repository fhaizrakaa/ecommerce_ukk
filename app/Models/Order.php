<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// WAJIB TAMBAHKAN BARIS INI:
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'no_hp',
        'alamat',
        'total_price',
        'status'
    ];

    // Gunakan satu saja, orderItems lebih umum digunakan
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function items()
{
    return $this->hasMany(OrderItem::class);
}
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
