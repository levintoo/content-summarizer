<?php

namespace App\Policies;

use App\Models\Summary;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SummaryPolicy
{
    /**
     * Not found instead of forbidden, so other users' summary IDs are not revealed.
     */
    public function view(User $user, Summary $summary): Response
    {
        return $this->owns($user, $summary);
    }

    public function viewShared(?User $user, Summary $summary): Response
    {
        return $summary->shared || ($user && $user->id === $summary->user_id)
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function update(User $user, Summary $summary): Response
    {
        return $this->owns($user, $summary);
    }

    public function delete(User $user, Summary $summary): Response
    {
        return $this->owns($user, $summary);
    }

    protected function owns(User $user, Summary $summary): Response
    {
        return $user->id === $summary->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
