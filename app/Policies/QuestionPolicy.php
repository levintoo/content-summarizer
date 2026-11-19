<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuestionPolicy
{
    public function update(User $user, Question $question): Response
    {
        return $user->id === $question->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
