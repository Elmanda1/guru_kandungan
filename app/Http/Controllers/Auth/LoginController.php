<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('auth.login', [
            'title' => __('Login'),
        ]);
    }

    public function submit(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $credential = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];

        if (auth()->attempt($credential, $validatedData['remember_me'] ?? false)) {
            $request->session()->regenerate();

            // Cek apakah ada redirect parameter dari query string
            $redirectUrl = $request->input('redirect');
            
            if ($redirectUrl) {
                // Validasi URL untuk keamanan (pastikan URL valid dan dari domain yang sama)
                $parsedUrl = parse_url($redirectUrl);
                $currentHost = $request->getHost();
                
                // Jika URL relative atau dari host yang sama, redirect ke sana
                if (!isset($parsedUrl['host']) || $parsedUrl['host'] === $currentHost) {
                    return redirect($redirectUrl);
                }
            }

            // Default redirect
            return redirect()->route('my-home');
        }

        session()->flash('error', __('Incorrect email or password'));

        return redirect()->back()->withInput();
    }
}