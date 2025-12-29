<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'description',
        'price',
        'cost_price',
        'stock',
        'security_stock',
        'is_visible',
        'is_featured',
        'published_at',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
        'is_visible' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
