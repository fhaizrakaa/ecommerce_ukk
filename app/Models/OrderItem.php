<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// WAJIB TAMBAHKAN BARIS INI
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    /**
     * Relasi ke model Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relasi ke model Order (Opsional, tapi bagus untuk dimiliki)
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
