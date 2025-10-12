@extends('layouts.app')

@section('content')
    <div class="row row-gap-32">
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12 col-lg-6">
                    <x-section.app.page-title title="{{ $title }}"/>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="text-lg-end">
                        <a href="{{ route('participant.index') }}"
                           class="btn btn-light border"
                        >
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('participant.update', $participant) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        {{ __('Full Name') }}
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('name') != null ? 'is-invalid' : '' }}"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') ?? $participant->name }}"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">
                                        {{ __('NIK') }}
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('nik') != null ? 'is-invalid' : '' }}"
                                        id="nik"
                                        name="nik"
                                        value="{{ old('nik') ?? $participant->nik }}"
                                        minlength="16"
                                        maxlength="16"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nik') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        {{ __('Email') }}
                                    </label>
                                    <input
                                        type="email"
                                        class="form-control {{ $errors->first('email') != null ? 'is-invalid' : '' }}"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') ?? $participant->email }}"
                                        maxlength="255"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">
                                        {{ __('Phone') }}
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('phone') != null ? 'is-invalid' : '' }}"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') ?? $participant->phone }}"
                                        maxlength="13"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">
                                        {{ __('Address') }}
                                    </label>
                                    <textarea
                                        type="text"
                                        class="form-control {{ $errors->first('address') != null ? 'is-invalid' : '' }}"
                                        id="address"
                                        name="address"
                                        rows="3"
                                        required
                                    >{{ old('address') ?? $participant->address }}</textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="institution" class="form-label">
                                        {{ __('Institution') }}
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('institution') != null ? 'is-invalid' : '' }}"
                                        id="institution"
                                        name="institution"
                                        value="{{ old('institution') ?? $participant->institution }}"
                                        maxlength="255"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('institution') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="department" class="form-label">
                                        {{ __('Department') }}
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('department') != null ? 'is-invalid' : '' }}"
                                        id="department"
                                        name="department"
                                        value="{{ old('department') ?? $participant->department}}"
                                        maxlength="255"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('department') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="education_level_id" class="form-label">
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
                                                @if(old('education_level_id') ?? $participant->education_level_id == $educationLevel->id)
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
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">
                                        {{ __('Photo') }}
                                    </label>
                                    <input
                                        type="file"
                                        class="form-control {{ $errors->first('photo') != null ? 'is-invalid' : '' }}"
                                        id="photo"
                                        name="photo"
                                        value="{{ old('photo') }}"
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('photo') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password
                                        <span class="form-text d-block d-lg-inline">(Hanya diisi ketika ingin merubah password)</span>
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
                            </div>

                            <div class="col-12 col-lg-6">
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
                            </div>
                        </div>

                        <div class="text-end mt-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
