<?php

use App\Models\Summary;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('summary.{summaryId}.user.{userId}', function ($user, $summaryId, $userId) {
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('content-transcribed-{id}', function (User $user, string $summaryId) {
    return (int) $user->id === Summary::query()->select(['id', 'user_id'])->with('user', fn ($q) => $q->select('id'))->findOrFail($summaryId)->user->id;
});
