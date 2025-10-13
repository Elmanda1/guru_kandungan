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
                                    Login
                                </h4>

                                @if(session()->has('error'))
                                    <x-alert.danger message="{{ session()->get('error') }}"/>
                                @endif

                                @if(session()->has('info'))
                                    <x-alert.info message="{{ session()->get('info') }}"/>
                                @endif

                                <form action="{{ route('auth.login.submit') }}" method="post">
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
                                            value="{{ old('email') ?? auth()->user()?->email }}"
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
                                    
                                    <div class="mb-3 d-flex justify-content-end">
                                        <a href="{{ route('auth.forgot.password') }}" class="text-decoration-none small">
                                            Lupa Password?
                                        </a>
                                    </div>
                                    
                                    <div class="mb-3 form-check">
                                        <input type="checkbox"
                                               class="form-check-input"
                                               id="rememberMe"
                                               name="remember_me"
                                               value="1"
                                            {{ old('remember_me') == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label"
                                               for="rememberMe">{{ __('Remember me') }}</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Login
                                    </button>

                                    <div class="text-center small mt-2 text-secondary">
                                        {{ __('Don\'t have an account?') }}
                                        <a href="{{ route('auth.register') }}" class="text-decoration-none">Registrasi</a>
                                    </div>

                                    <hr class="hr-text small" data-content="atau"/>

                                    <a href="{{ route('auth.google') }}"
                                       class="btn border w-100 d-flex align-items-center">
                                        <img src="{{ asset('assets/images/google-icon.png') }}" alt="Google Icon"
                                             width="20" height="20"/>
                                        <span class="text-center w-100">Login dengan Google</span>
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
