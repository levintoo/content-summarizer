<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleOAuthController extends Controller
{
    public function __invoke()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::query()->where('email', $googleUser->getEmail())->first();

        if (! $user) {
            $user = (new User)->forceFill([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'email_verified_at' => now(),
                'password' => Str::password(32),
                'role' => RoleEnum::USER,
            ]);

            $user->save();
        } elseif (! $user->hasVerifiedEmail()) {
            // Someone may have registered this address without owning it. Google has
            // now proven ownership, so drop any credentials that person could have set.
            $user->forceFill([
                'email_verified_at' => now(),
                'password' => Str::password(32),
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'two_factor_confirmed_at' => null,
            ])->save();
        }

        if ($user->hasEnabledTwoFactorAuthentication()) {
            session(['login.id' => $user->id]);

            return to_route('two-factor.login');
        }

        auth()->login($user);

        return redirect()->intended(route('summary.create'));
    }
}
