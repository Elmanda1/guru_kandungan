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
                        <a href="{{ route('lecturer.index') }}"
                           class="btn btn-light me-2 border"
                        >
                            {{ __('Back') }}
                        </a>

                        <a href="{{ route('lecturer.edit', $lecturer) }}"
                           class="btn btn-success"
                        >
                            {{ __('Edit') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                                        value="{{ old('name') ?? $lecturer->name }}"
                                        maxlength="255"
                                        disabled
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
                                        value="{{ old('nik') ?? $lecturer->nik }}"
                                        min="16"
                                        maxlength="16"
                                        disabled
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
                                        value="{{ old('email') ?? $lecturer->email }}"
                                        maxlength="255"
                                        disabled
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
                                        value="{{ old('phone') ?? $lecturer->phone }}"
                                        maxlength="13"
                                        disabled
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
                                        disabled
                                    >{{ old('address') ?? $lecturer->address }}</textarea>
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
                                        value="{{ old('institution') ?? $lecturer->institution }}"
                                        maxlength="255"
                                        disabled
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('institution') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="department" class="col-sm-3 col-form-label">
                                    {{ __('Department') }}
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('department') != null ? 'is-invalid' : '' }}"
                                        id="department"
                                        name="department"
                                        value="{{ old('department') ?? $lecturer->department->name }}"
                                        maxlength="255"
                                        disabled
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('department') }}
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
                                        disabled
                                    >
                                        <option value="" selected>Pilih salah satu opsi</option>

                                        @foreach($educationLevels as $educationLevel)
                                            <option
                                                value="{{ $educationLevel->id }}"
                                                @if(old('education_level_id') ?? $lecturer->education_level_id == $educationLevel->id)
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
                                             src="{{ $lecturer->getPhotoUrl() }}"
                                             alt="{{ $lecturer->name }}"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="cv" class="col-sm-3 col-form-label">
                                    {{ __('CV') }}
                                </label>
                                <div class="col-sm-9">
                                    <textarea
                                        type="text"
                                        class="form-control {{ $errors->first('cv') != null ? 'is-invalid' : '' }}"
                                        id="cv"
                                        name="cv"
                                        rows="3"
                                        disabled
                                    >{{ old('cv') ?? $lecturer->cv }}</textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('cv') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
