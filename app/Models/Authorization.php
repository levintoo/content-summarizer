<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authorization extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'authorization_code',
        'bin',
        'last4',
        'exp_month',
        'exp_year',
        'channel',
        'card_type',
        'bank',
        'country_code',
        'brand',
        'reusable',
        'signature',
        'account_name',
        'email',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
