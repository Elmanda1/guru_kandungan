<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {
        $user = User::find($request->route('id'));

        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        auth()->login($user);

        return redirect()->route('my-home');
    }

    public function notice()
    {
        session()->flash('info', 'Silakan verifikasi email Anda terlebih dahulu untuk melanjutkan');

        return view('auth.login', [
            'title' => __('Login'),
        ]);
    }

    public function manualVerification(User $user)
    {
        try {
            $user->markEmailAsVerified();

            session()->flash('success', __('Email verification successful'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('success', __('Failed to verify email'));

            return redirect()->back();
        }
    }
}
