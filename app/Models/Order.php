<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'number',
        'status',
        'currency',
        'total_price',
        'shipping_price',
        'shipping_method',
        'notes',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_line_1',
        'shipping_line_2',
        'shipping_city',
        'shipping_state',
        'shipping_zip',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
