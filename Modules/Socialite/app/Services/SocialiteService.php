<?php

namespace Modules\Socialite\Services;

use Laravel\Socialite\Facades\Socialite;
use Modules\Socialite\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

class SocialiteService
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = $this->createUser($socialUser, $provider);
            }

            Auth::login($user);
            return redirect('/dashboard');

        } catch (Exception $e) {
            Log::error("OAuth Login Error: " . $e->getMessage());
            return redirect('/login')->with('error', 'Something went wrong!');
        }
    }

    private function createUser($socialUser, string $provider): User
    {
        return User::create([
            'name' => $socialUser->getName(),
            'email' => $socialUser->getEmail(),
            'provider' => $provider,
            'provider_id' => $socialUser->getId(),
            'password' => bcrypt('password'), // يفضل تحديث كلمة المرور لاحقًا
        ]);
    }
}
