<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationCompletionRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class RegistrationCompletionController extends Controller
{
    public function __invoke()
    {
        if (! auth()->user()->hasNoRoles()) {
            return redirect()->route('auth.login');
        }

        return view('auth.registration-completion', [
            'title' => __('Registration Completion'),
            'user' => auth()->user(),
        ]);
    }

    public function submit(RegistrationCompletionRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $user = auth()->user();
            $user->assignRole($validatedData['registration_type']);

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return redirect()->back()->withInput();
        }
    }
}
