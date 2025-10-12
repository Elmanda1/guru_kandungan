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
                                    {{ __('Registration Completion') }}
                                </h4>

                                <form action="{{ route('auth.registration-completion.submit') }}" method="post">
                                    @csrf
                                    @method('put')

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
                                        <label for="name" class="form-label">
                                            {{ __('Full Name') }}
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control {{ $errors->first('name') != null ? 'is-invalid' : '' }}"
                                            id="name"
                                            name="name"
                                            value="{{ old('name') ?? $user->name }}"
                                            disabled
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
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
                                            value="{{ old('email') ?? $user->email }}"
                                            disabled
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        {{ __('Save') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
