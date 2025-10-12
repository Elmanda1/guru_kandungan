<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $userFromGoogle = Socialite::driver('google')->user();

        $userFromDatabase = User::query()
            ->where('google_id', $userFromGoogle->getId())
            ->orWhere('email', $userFromGoogle->getEmail())
            ->first();

        if (! $userFromDatabase) {
            $newUser = new User([
                'google_id' => $userFromGoogle->getId(),
                'name' => $userFromGoogle->getName(),
                'email' => $userFromGoogle->getEmail(),
            ]);

            $newUser->markEmailAsVerified();
            $newUser->save();

            auth()->login($newUser, true);
            session()->regenerate();

            return redirect()->route('auth.registration-completion');
        }

        if ($userFromDatabase->google_id == null) {
            $userFromDatabase->update(['google_id' => $userFromGoogle->getId()]);
        }

        auth()->login($userFromDatabase, true);
        session()->regenerate();

        return redirect()->route('my-home');
    }
}
