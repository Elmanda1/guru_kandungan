<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileCompletionRequest;
use App\Models\Department;
use App\Models\EducationLevel;
use Exception;
use Illuminate\Support\Facades\Log;

class ProfileCompletionController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->isProfileComplete()) {
            return redirect()->route('auth.login');
        }

        return view('auth.profile-completion', [
            'title' => __('Profile Completion'),
            'user' => auth()->user(),
            'departments' => Department::all(),
            'educationLevels' => EducationLevel::all(),
        ]);
    }

    public function submit(ProfileCompletionRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $user = auth()->user();
            $user->update($validatedData);

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return redirect()->back()->withInput();
        }
    }
}
