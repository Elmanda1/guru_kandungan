@extends('layouts.app')

@push('style')
    <link rel="stylesheet"
          type="text/css"
          href="{{ asset('assets/css/evo-calendar.min.css') }}">
    <link rel="stylesheet"
          type="text/css"
          href="{{ asset('assets/css/evo-calendar.royal-navy.min.css') }}">
@endpush

@section('content')
    <div class="row row-gap-32">
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12 col-lg-6">
                    <x-section.app.page-title title="{{ $title }}"/>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end gap-2 flex-wrap">
                        <a href="{{ route('course.show', $course) }}"
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
                <form action="{{ route('course.update', $course) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="card-header">
                        <h2 class="mb-2 card-title">Data Pembelajaran</h2>
                        <p class="text-muted small m-0">Silakan ubah data pembelajaran.</p>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="mb-3">
                                    <label for="topic_id" class="form-label required">
                                        {{ __('Topic') }}
                                    </label>
                                    <div class="input-group">
                                        <select
                                            class="form-select {{ $errors->first('topic_id') != null ? 'is-invalid' : '' }}"
                                            id="topic_id"
                                            name="topic_id"
                                            {{ $course->isDone() ? 'readonly' : 'required' }}
                                        >
                                            <option value="" selected>Pilih salah satu opsi</option>

                                            @foreach($topics as $topic)
                                                <option
                                                    value="{{ $topic->id }}"
                                                    @if(old('topic_id', $course->topic_id) == $topic->id)
                                                        selected
                                                    @endif
                                                >
                                                    {{ $topic->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button
                                            class="input-group-text"
                                            type="button"
                                            data-coreui-toggle="modal"
                                            data-coreui-target="#createModal"
                                        >
                                            <x-heroicon-o-plus height="18"/>
                                        </button>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('topic_id') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label required">
                                        {{ __('Title') }}
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('title') != null ? 'is-invalid' : '' }}"
                                        id="title"
                                        name="title"
                                        value="{{ old('title', $course->title) }}"
                                        {{ $course->isDone() ? 'readonly' : 'required' }}
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="education_level_ids" class="form-label required">
                                    Sasaran Peserta
                                </label>
                                <div
                                    class="form-control {{ $errors->first('education_level_ids') != null ? 'is-invalid' : '' }}"
                                >
                                    @foreach($educationLevels as $educationLevel)
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="education-level-{{ $educationLevel->id }}"
                                                value="{{ $educationLevel->id }}"
                                                name="education_level_ids[]"
                                                {{ in_array($educationLevel->id, old('education_level_ids', $course->educationLevelIds())) ? 'checked' : '' }}
                                                {{ $course->isDone() ? 'readonly' : '' }}
                                            >
                                            <label class="form-check-label"
                                                   for="education-level-{{ $educationLevel->id }}">
                                                {{ $educationLevel->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <span class="error invalid-feedback">
                                    {{ $errors->first('education_level_ids') }}
                                </span>
                            </div>

                            @if(auth()->user()->isAdmin())
                                <div class="col-12 ">
                                    <div class="mb-3">
                                        <label for="lecturer_id" class="form-label required">
                                            {{ __('Speaker') }}
                                        </label>
                                        <select
                                            class="form-select {{ $errors->first('lecturer_id') != null ? 'is-invalid' : '' }}"
                                            id="lecturer_id"
                                            name="lecturer_id"
                                            {{ $course->isDone() ? 'readonly' : 'required' }}
                                        >
                                            <option value="" selected>Pilih salah satu opsi</option>

                                            @foreach($lecturers as $lecturer)
                                                <option
                                                    value="{{ $lecturer->id }}"
                                                    @if(old('lecturer_id', $course->lecturer_id) == $lecturer->id)
                                                        selected
                                                    @endif
                                                >
                                                    {{ $lecturer->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('lecturer_id') }}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="lecturer_id" value="{{ auth()->id() }}"/>
                            @endif

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label required">
                                        {{ __('Description') }}
                                    </label>
                                    <textarea
                                        type="text"
                                        class="form-control {{ $errors->first('description') != null ? 'is-invalid' : '' }}"
                                        id="description"
                                        name="description"
                                        rows="3"
                                        {{ $course->isDone() ? 'readonly' : 'required' }}
                                    >{{ old('description', $course->description) }}</textarea>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="border shadow-none" id="calendar"></div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="date" class="form-label required">
                                        {{ __('Date') }}
                                    </label>
                                    <input
                                        type="date"
                                        class="form-control {{ $errors->first('date') != null ? 'is-invalid' : '' }}"
                                        id="date"
                                        name="date"
                                        value="{{ old('date', $course->date) }}"
                                        min="{{ date("Y-m-d") }}"
                                        {{ $course->isDone() ? 'readonly' : 'required' }}
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('date') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label required">
                                        {{ __('Start Time') }}
                                    </label>
                                    <input
                                        type="time"
                                        class="form-control {{ $errors->first('start_time') != null ? 'is-invalid' : '' }}"
                                        id="start_time"
                                        name="start_time"
                                        value="{{ old('start_time', $course->start_time) }}"
                                        {{ $course->isDone() ? 'readonly' : 'required' }}
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('start_time') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="quota" class="form-label required">
                                        {{ __('Quota') }}
                                    </label>
                                    <input
                                        type="number"
                                        class="form-control {{ $errors->first('quota') != null ? 'is-invalid' : '' }}"
                                        id="quota"
                                        name="quota"
                                        value="{{ old('quota',$course->quota) }}"
                                        min="0"
                                        {{ $course->isDone() ? 'readonly' : 'required' }}
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('quota') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header border-top">
                        <h2 class="mb-2 card-title">Data Zoom</h2>
                        <p class="text-muted small m-0">Silakan ubah data zoom.</p>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="zoom_link" class="form-label required">
                                        {{ __('Link Zoom') }}
                                    </label>
                                    <input
                                        type="url"
                                        class="form-control {{ $errors->first('zoom_link') != null ? 'is-invalid' : '' }}"
                                        id="zoom_link"
                                        name="zoom_link"
                                        value="{{ old('zoom_link', $course->zoom_link) }}"
                                        {{ $course->isDone() ? 'readonly' : 'required' }}
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('zoom_link') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="zoom_id" class="form-label required">
                                        {{ __('ID Zoom') }}
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('zoom_id') != null ? 'is-invalid' : '' }}"
                                        id="zoom_id"
                                        name="zoom_id"
                                        value="{{ old('zoom_id', $course->zoom_id) }}"
                                        {{ $course->isDone() ? 'readonly' : 'required' }}
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('zoom_id') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="zoom_password" class="form-label required">
                                        {{ __('Password Zoom') }}
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control {{ $errors->first('zoom_password') != null ? 'is-invalid' : '' }}"
                                        id="zoom_password"
                                        name="zoom_password"
                                        value="{{ old('zoom_password', $course->zoom_password) }}"
                                        {{ $course->isDone() ? 'readonly' : 'required' }}
                                    >
                                    <div class="invalid-feedback">
                                        {{ $errors->first('zoom_password') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!$course->isDone())
                            <div class="text-end mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        @endif
                    </div>

                    @if($course->isDone())
                        <div class="card-header border-top">
                            <h2 class="mb-0 card-title">Data Youtube</h2>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label for="youtube_link" class="form-label required">
                                            {{ __('Link Youtube') }}
                                        </label>
                                        <div class="input-group">
                                            <input
                                                type="url"
                                                class="form-control {{ $errors->first('youtube_link') != null ? 'is-invalid' : '' }}"
                                                id="youtube_link"
                                                name="youtube_link"
                                                value="{{ old('youtube_link', $course->youtube_link) }}"
                                                required
                                            >
                                            <button
                                                class="input-group-text"
                                                type="button"
                                                data-coreui-toggle="modal"
                                                data-coreui-target="#youtube-modal"
                                            >
                                                <x-heroicon-o-play height="18"/>
                                            </button>
                                        </div>
                                        <div class="invalid-feedback">
                                            {{ $errors->first('youtube_link') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" data-coreui-backdrop="static" data-coreui-keyboard="false"
         tabindex="-1"
         aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('topic.store') }}" method="post">
                    @csrf

                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="createModalLabel">{{ __('Add Topic') }}</h5>
                        <button type="reset" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body py-0">
                        <div class="mb-3">
                            <label for="name" class="form-label required">
                                Nama
                            </label>
                            <input
                                type="text"
                                class="form-control {{ $errors->first('name') != null ? 'is-invalid' : '' }}"
                                id="password"
                                name="name"
                                value="{{ old('name') }}"
                                maxlength="255"
                            >
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-2">
                        <button type="reset" class="btn btn-secondary my-0"
                                data-coreui-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary my-0">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="youtube-modal" data-coreui-backdrop="static" data-coreui-keyboard="false"
         tabindex="-1"
         aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-0">
                    <iframe
                        width="100%"
                        height="400px"
                        src="{{ $course->embeddedYoutubeLink }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin"
                        allowfullscreen
                    >
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {!! session('script') !!}

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/evo-calendar.min.js') }}"></script>

    <script>
        $("#calendar").evoCalendar({
            theme: 'Royal Navy',
            calendarEvents: {!! $courseCalendarEvents !!},
        });

        $('#calendar').evoCalendar('toggleEventList', true);

        $('#calendar').on('selectEvent', function (event, activeEvent) {
            window.location.href = activeEvent.detail_link;
        });
    </script>
@endpush
