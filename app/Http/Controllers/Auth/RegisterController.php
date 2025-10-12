<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\AccountVerificationMail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __invoke()
    {
        return view('auth.register', [
            'title' => __('Register'),
        ]);
    }

    public function submit(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            $user = User::query()->create($validatedData);
            $user->assignRole($validatedData['registration_type']);
            auth()->loginUsingId($user->id);

            Mail::to($user->email)->send(new AccountVerificationMail($user));

            DB::commit();

            session()->flash('info', 'Registrasi berhasil! Email verifikasi telah dikirim ke email Anda.');

            return redirect()->route('auth.login');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            DB::rollBack();

            session()->flash('error', __('Registration failed, please try again later'));

            return redirect()->back()->withInput();
        }
    }
}
