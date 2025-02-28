<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Charge extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'authorization_id',
        'amount',
        'currency',
        'status',
        'reference',
        'invoice_code',
        'channel',
        'paid_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function authorization(): BelongsTo
    {
        return $this->belongsTo(Authorization::class);
    }

    protected function casts(): array
    {
        return [
            'paid_at' => 'datetime',
        ];
    }
}
