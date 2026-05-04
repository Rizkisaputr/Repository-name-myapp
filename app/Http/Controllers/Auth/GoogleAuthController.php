<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName() ?: 'Google User',
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'password' => Hash::make(Str::random(32)),
                ]);
            } else {
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => $user->email_verified_at ?: now(),
                ]);
            }

            Auth::login($user, true);

            request()->session()->regenerate();

            return redirect()->route('dashboard');

        } catch (\Throwable $e) {
            report($e);

            return redirect()
                ->route('login')
                ->with('error', 'Login Google gagal: ' . $e->getMessage());
        }
    }
}