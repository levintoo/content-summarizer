<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleOAuthController extends Controller
{
    public function __invoke()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::query()->where('email', $googleUser->getEmail())->firstOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'avatar' => $googleUser->getAvatar(),
            'email_verified_at' => now(),
            'password' => \Str::password(16),
            'role' => RoleEnum::USER,
        ]);

        if ($user->hasEnabledTwoFactorAuthentication()) {
            session(['login.id' => $user->id]);

            return to_route('two-factor.login');
        }

        auth()->login($user);

        return redirect()->intended(route('summary.create'));
    }
}
