@extends('layouts.default')

@section('content')
    <main id="login">
        <section id="login-form">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center fw-bold mb-5">
                                    Registrasi
                                </h4>

                                @if(session()->has('error'))
                                    <x-alert.danger message="{{ session()->get('error') }}"/>
                                @endif

                                <form action="{{ route('auth.register.submit') }}" method="post">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="registration_type" class="form-label">
                                            {{ __('Registration Type') }}
                                        </label>

                                        <div class="d-flex gap-2">
                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="registration_type"
                                                id="participant"
                                                value="participant"
                                                autocomplete="off"
                                                checked
                                            >
                                            <label class="btn btn-outline-primary w-100" for="participant">
                                                {{ __('Participant') }}
                                            </label>

                                            <input
                                                type="radio"
                                                class="btn-check"
                                                name="registration_type"
                                                id="lecturer"
                                                value="lecturer"
                                                autocomplete="off"
                                            >
                                            <label class="btn btn-outline-primary w-100" for="lecturer">
                                                {{ __('Lecturer') }}
                                            </label>
                                        </div>
                                    </div>

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
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">
                                            Password
                                        </label>
                                        <input
                                            type="password"
                                            class="form-control {{ $errors->first('password') != null ? 'is-invalid' : '' }}"
                                            id="password"
                                            name="password"
                                            value="{{ old('password') }}"
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
                                            class="form-control {{ $errors->first('password_confirmation') != null ? 'is-invalid' : '' }}"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            value="{{ old('password_confirmation') }}"
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Registrasi
                                    </button>

                                    <div class="text-center small mt-2 text-secondary">
                                        {{ __('Already have an account?') }}
                                        <a href="{{ route('auth.login') }}" class="text-decoration-none">Login</a>
                                    </div>

                                    <hr class="hr-text small" data-content="atau"/>

                                    <a href="{{ route('auth.google') }}"
                                       class="btn border w-100 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/google-icon.png') }}" alt="Google Icon"
                                             width="20" height="20"/>
                                        <span class="text-center w-100">Registrasi dengan Google</span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
