@extends('layouts.default')

@section('content')
    <main id="forgot-password">
        <section id="forgot-password-form" class="my-5 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center fw-bold mb-3">
                                    Lupa Password
                                </h4>
                                <p class="text-center text-muted small mb-4">
                                    Masukkan email Anda dan kami akan mengirimkan link untuk reset password
                                </p>

                                @if(session()->has('success'))
                                    <x-alert.success message="{{ session()->get('success') }}"/>
                                @endif

                                @if(session()->has('error'))
                                    <x-alert.danger message="{{ session()->get('error') }}"/>
                                @endif

                                <form action="{{ route('auth.forgot.password.submit') }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            Email
                                        </label>
                                        <input
                                            type="email"
                                            class="form-control {{ $errors->first('email') != null ? 'is-invalid' : '' }}"
                                            id="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="nama@example.com"
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Kirim Link Reset Password
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