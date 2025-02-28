<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'plan_code',
        'amount',
        'interval',
        'currency',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'plan_id');
    }

    public function active_subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'plan_id')
            ->whereIn('status', ['active', 'non-renewing'])
            ->whereDate('next_payment_date', '>=', now());
    }
}
