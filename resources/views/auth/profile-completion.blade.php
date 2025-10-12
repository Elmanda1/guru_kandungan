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
                                    {{ __('Profile Completion') }}
                                </h4>

                                <x-alert.info
                                    message="{{ __('Please complete your profile to use the application') }}"/>

                                <form action="{{ route('auth.profile-completion.submit') }}" method="post" novalidate>
                                    @csrf
                                    @method('put')

                                    <div class="mb-3">
                                        <label for="name" class="form-label required">
                                            {{ __('Full Name') }}
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control {{ $errors->first('name') != null ? 'is-invalid' : '' }}"
                                            id="name"
                                            name="name"
                                            value="{{ old('name') ?? $user->name }}"
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nik" class="form-label required">
                                            {{ __('NIK') }}
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control {{ $errors->first('nik') != null ? 'is-invalid' : '' }}"
                                            id="nik"
                                            name="nik"
                                            value="{{ old('nik') ?? $user->nik }}"
                                            minlength="16"
                                            maxlength="16"
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nik') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label required">
                                            {{ __('Phone') }}
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control {{ $errors->first('phone') != null ? 'is-invalid' : '' }}"
                                            id="phone"
                                            name="phone"
                                            value="{{ old('phone') ?? $user->phone }}"
                                            maxlength="13"
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="address" class="form-label required">
                                            {{ __('Address') }}
                                        </label>
                                        <textarea
                                            type="text"
                                            class="form-control {{ $errors->first('address') != null ? 'is-invalid' : '' }}"
                                            id="address"
                                            name="address"
                                            rows="3"
                                            required
                                        >{{ old('address') ?? $user->address }}</textarea>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('address') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="institution" class="form-label required">
                                            {{ __('Institution') }}
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control {{ $errors->first('institution') != null ? 'is-invalid' : '' }}"
                                            id="institution"
                                            name="institution"
                                            value="{{ old('institution') ?? $user->institution }}"
                                            maxlength="255"
                                            required
                                        >
                                        <div class="invalid-feedback">
                                            {{ $errors->first('institution') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="department_id" class="form-label required">
                                            {{ __('Department') }}
                                        </label>
                                        <select
                                            class="form-select {{ $errors->first('department_id') != null ? 'is-invalid' : '' }}"
                                            id="department_id"
                                            name="department_id"
                                            required
                                        >
                                            <option value="" selected>Pilih salah satu opsi</option>

                                            @foreach($departments as $department)
                                                <option
                                                    value="{{ $department->id }}"
                                                    @if(old('department_id') ?? $user->department_id == $department->id)
                                                        selected
                                                    @endif
                                                >
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('department_id') }}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="education_level_id" class="form-label required">
                                            {{ __('Education Level') }}
                                        </label>
                                        <select
                                            class="form-select {{ $errors->first('education_level_id') != null ? 'is-invalid' : '' }}"
                                            id="education_level_id"
                                            name="education_level_id"
                                            required
                                        >
                                            <option value="" selected>Pilih salah satu opsi</option>

                                            @foreach($educationLevels as $educationLevel)
                                                <option
                                                    value="{{ $educationLevel->id }}"
                                                    @if(old('education_level_id') ?? $user->education_level_id == $educationLevel->id)
                                                        selected
                                                    @endif
                                                >
                                                    {{ $educationLevel->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('education_level_id') }}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-2">
                                        Simpan
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
