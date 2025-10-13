@extends('layouts.default')

@section('content')
    <main id="reset-password">
        <section id="reset-password-form" class="my-5 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center fw-bold mb-3">
                                    Reset Password
                                </h4>
                                <p class="text-center text-muted small mb-4">
                                    Masukkan password baru Anda
                                </p>

                                @if(session()->has('error'))
                                    <x-alert.danger message="{{ session()->get('error') }}"/>
                                @endif

                                <form action="{{ route('password.update') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ $email }}">

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Password Baru
                                        </label>
                                        <input
                                            type="password"
                                            class="form-control {{ $errors->first('password') != null ? 'is-invalid' : '' }}"
                                            id="password"
                                            name="password"
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">
                                            Konfirmasi Password
                                        </label>
                                        <input
                                            type="password"
                                            class="form-control {{ $errors->first('password') != null ? 'is-invalid' : '' }}"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                        >
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Reset Password
                                    </button>

                                    <div class="text-center small mt-3 text-secondary">
                                        <a href="{{ route('auth.login') }}" class="text-decoration-none">
                                            ← Kembali ke Login
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection