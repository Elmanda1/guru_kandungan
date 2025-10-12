@extends('layouts.app')

@section('content')
    <x-section.my-account>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-2">{{ __('Profile') }}</h2>
                <p class="text-muted small">
                    Kelola data diri Anda untuk komunikasi dan personalisasi sistem.
                </p>

                <form action="{{ route('my-account.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">
                                    {{ __('Full Name') }}
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('name') != null ? 'is-invalid' : '' }}"
                                        id="name"
                                        name="name"
                                        value="{{ old('name') ?? $user->name }}"
                                        maxlength="255"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="nik" class="col-sm-3 col-form-label">
                                    {{ __('NIK') }}
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('nik') != null ? 'is-invalid' : '' }}"
                                        id="nik"
                                        name="nik"
                                        value="{{ old('nik') ?? $user->nik }}"
                                        min="16"
                                        maxlength="16"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('nik') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">
                                    {{ __('Email') }}
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="email"
                                        class="form-control {{ $errors->first('email') != null ? 'is-invalid' : '' }}"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') ?? $user->email }}"
                                        maxlength="255"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-3 col-form-label">
                                    {{ __('Phone') }}
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('phone') != null ? 'is-invalid' : '' }}"
                                        id="phone"
                                        name="phone"
                                        value="{{ old('phone') ?? $user->phone }}"
                                        maxlength="13"
                                        required
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-3 col-form-label">
                                    {{ __('Address') }}
                                </label>
                                <div class="col-sm-9">
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
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="institution" class="col-sm-3 col-form-label">
                                    {{ __('Institution') }}
                                </label>
                                <div class="col-sm-9">
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
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="department_id" class="col-sm-3 col-form-label">
                                    {{ __('Department') }}
                                </label>
                                <div class="col-sm-9">
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
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="education_level_id" class="col-sm-3 col-form-label">
                                    {{ __('Education Level') }}
                                </label>
                                <div class="col-sm-9">
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
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="photo" class="col-sm-3 col-form-label">
                                    {{ __('Photo') }}
                                </label>
                                <div class="col-sm-6">
                                    <div class="d-flex flex-column flex-lg-row align-items-center">
                                        <img class="avatar avatar-80 me-3 mb-3 mb-lg-0"
                                             src="{{ auth()->user()->getPhotoUrl() }}"
                                             alt="{{ auth()->user()->name }}"
                                        >
                                        <div>
                                            <input
                                                type="file"
                                                class="form-control {{ $errors->first('photo') != null ? 'is-invalid' : '' }}"
                                                id="photo"
                                                name="photo"
                                                value="{{ old('photo') ?? $user->photo }}"
                                                maxlength="255"
                                            >
                                            <div class="invalid-feedback">
                                                {{ $errors->first('photo') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-2">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-section.my-account>
@endsection
