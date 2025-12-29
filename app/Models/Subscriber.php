<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'email',
        'subscribed_at',
        'is_active',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public $timestamps = false; // We only have subscribed_at and no updated_at usually needed for this simple table, but migration has valid timestamps?
    // Wait, I removed timestamps() in migration. So no created_at/updated_at.
    // Migration: table->timestamp('subscribed_at')->useCurrent();
    // I need to make sure Eloquent knows not to expect timestamps.
}
