@extends('layouts.app')

@section('content')
    <div class="row row-gap-32">
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12 col-lg-6">
                    <x-section.app.page-title title="{{ $title }}"/>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end gap-2 flex-wrap">
                        <a href="{{ route('course.index') }}"
                           class="btn btn-light border"
                        >
                            {{ __('Back') }}
                        </a>

                        @if(!$course->isCancelled() && !$course->isDone())
                            @if($course->isStarting())
                                <a
                                    class="btn btn-primary"
                                    href="{{ $course->zoom_link }}"
                                    target="_blank"
                                >
                                    {{ __('Mulai Pembelajaran') }}
                                </a>
                            @endif

                            <button
                                class="btn btn-danger"
                                onclick="handleCancel({{ $course->id }})"
                            >
                                {{ __('Cancel It') }}
                            </button>
                        @endif

                        @if($course->isCancelled() && !$course->isDone())
                            <button
                                class="btn btn-danger"
                                onclick="handleDelete({{ $course->id }})"
                            >
                                {{ __('Delete') }}
                            </button>

                            <button
                                class="btn btn-primary"
                                onclick="handleContinue({{ $course->id }})"
                            >
                                {{ __('Continue It') }}
                            </button>
                        @endif

                        @if(!$course->isCancelled() && !$course->isDone())
                            <button
                                class="btn btn-primary"
                                data-coreui-toggle="modal"
                                data-coreui-target="#markAsCompleteModal"
                            >
                                {{ __('Mark As Completed') }}
                            </button>
                        @endif

                        @if($course->isDone())
                            <a
                                class="btn btn-primary"
                                href="{{ route('certificate.download', $course) }}"
                                target="_blank"
                            >
                                {{ __('Download Certificate') }}
                            </a>
                        @endif

                        <a href="{{ route('course.edit', $course) }}"
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
                <div class="card-header">
                    <h2 class="mb-0 card-title">Data Pembelajaran</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="topic_id" class="form-label">
                                    {{ __('Topic') }}
                                </label>
                                <select
                                    class="form-select {{ $errors->first('topic_id') != null ? 'is-invalid' : '' }}"
                                    id="topic_id"
                                    name="topic_id"
                                    disabled
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
                                <div class="invalid-feedback">
                                    {{ $errors->first('topic_id') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">
                                    {{ __('Title') }}
                                </label>
                                <input
                                    type="text"
                                    class="form-control {{ $errors->first('title') != null ? 'is-invalid' : '' }}"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $course->title) }}"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="education_level_ids" class="form-label">
                                Sasaran Peserta
                            </label>
                            <div
                                class="form-control {{ $errors->first('education_level_ids') != null ? 'is-invalid' : '' }}">
                                @foreach($educationLevels as $educationLevel)
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="education-level-{{ $educationLevel->id }}"
                                            value="{{ $educationLevel->id }}"
                                            name="education_level_ids[]"
                                            {{ in_array($educationLevel->id, old('education_level_ids', $course->educationLevelIds())) ? 'checked' : '' }}
                                            disabled
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
                                    <label for="lecturer_id" class="form-label">
                                        {{ __('Speaker') }}
                                    </label>
                                    <select
                                        class="form-select {{ $errors->first('lecturer_id') != null ? 'is-invalid' : '' }}"
                                        id="lecturer_id"
                                        name="lecturer_id"
                                        disabled
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
                        @endif

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">
                                    {{ __('Description') }}
                                </label>
                                <textarea
                                    type="text"
                                    class="form-control {{ $errors->first('description') != null ? 'is-invalid' : '' }}"
                                    id="description"
                                    name="description"
                                    rows="3"
                                    disabled
                                >{{ old('description', $course->description) }}</textarea>
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="date" class="form-label">
                                    {{ __('Date') }}
                                </label>
                                <input
                                    type="date"
                                    class="form-control {{ $errors->first('date') != null ? 'is-invalid' : '' }}"
                                    id="date"
                                    name="date"
                                    value="{{ old('date', $course->date) }}"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="start_time" class="form-label">
                                    {{ __('Start Time') }}
                                </label>
                                <input
                                    type="time"
                                    class="form-control {{ $errors->first('start_time') != null ? 'is-invalid' : '' }}"
                                    id="start_time"
                                    name="start_time"
                                    value="{{ old('start_time', $course->start_time) }}"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    {{ $errors->first('start_time') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="mb-3">
                                <label for="quota" class="form-label">
                                    {{ __('Quota') }}
                                </label>
                                <input
                                    type="number"
                                    class="form-control {{ $errors->first('quota') != null ? 'is-invalid' : '' }}"
                                    id="quota"
                                    name="quota"
                                    value="{{ old('quota',$course->quota) }}"
                                    min="0"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    {{ $errors->first('quota') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header border-top">
                    <h2 class="mb-0 card-title">Data Zoom</h2>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="zoom_link" class="form-label">
                                    {{ __('Link Zoom') }}
                                </label>
                                <input
                                    type="url"
                                    class="form-control {{ $errors->first('zoom_link') != null ? 'is-invalid' : '' }}"
                                    id="zoom_link"
                                    name="zoom_link"
                                    value="{{ old('zoom_link', $course->zoom_link) }}"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    {{ $errors->first('zoom_link') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="zoom_id" class="form-label">
                                    {{ __('ID Zoom') }}
                                </label>
                                <input
                                    type="text"
                                    class="form-control {{ $errors->first('zoom_id') != null ? 'is-invalid' : '' }}"
                                    id="zoom_id"
                                    name="zoom_id"
                                    value="{{ old('zoom_id', $course->zoom_id) }}"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    {{ $errors->first('zoom_id') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="zoom_password" class="form-label">
                                    {{ __('Password Zoom') }}
                                </label>
                                <input
                                    type="text"
                                    class="form-control {{ $errors->first('zoom_password') != null ? 'is-invalid' : '' }}"
                                    id="zoom_password"
                                    name="zoom_password"
                                    value="{{ old('zoom_password', $course->zoom_password) }}"
                                    disabled
                                >
                                <div class="invalid-feedback">
                                    {{ $errors->first('zoom_password') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($course->isDone())
                    <div class="card-header border-top">
                        <h2 class="mb-0 card-title">Data Youtube</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label for="youtube_link" class="form-label">
                                        {{ __('Link Youtube') }}
                                    </label>
                                    <div class="input-group">
                                        <input
                                            type="url"
                                            class="form-control"
                                            id="youtube_link"
                                            name="youtube_link"
                                            value="{{ old('youtube_link', $course->youtube_link) }}"
                                            disabled
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
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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

    <div class="modal fade" id="markAsCompleteModal" data-coreui-backdrop="static" data-coreui-keyboard="false"
         tabindex="-1"
         aria-labelledby="markAsCompleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('course.complete', $course) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="markAsCompleteModalLabel">{{ __('Mark As Completed') }}</h5>
                        <button type="reset" class="btn-close" data-coreui-dismiss="modal"
                                aria-label="Close"></button>
                    </div>

                    <div class="modal-body py-0">
                        <div class="mb-3">
                            <label for="youtube_link" class="form-label required">
                                Link Youtube
                            </label>
                            <input
                                type="url"
                                class="form-control {{ $errors->first('youtube_link') != null ? 'is-invalid' : '' }}"
                                id="password"
                                name="youtube_link"
                                value="{{ old('youtube_link') }}"
                                required
                            >
                            <div class="invalid-feedback">
                                {{ $errors->first('youtube_link') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-2">
                        <button type="reset" class="btn btn-secondary my-0"
                                data-coreui-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary my-0">{{ __('Confirm') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {!! session('script') !!}

    <script>
        function handleCancel(id) {
            new Swal({
                title: "Batalkan Pembelajaran",
                text: "Apakah Anda yakin ingin melakukan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-warning text-white",
                    cancelButton: "btn btn-secondary ms-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = `{{ route('course.cancel', ['courseId']) }}`.replace('courseId', id);
                    let form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', url);

                    let csrfField = document.createElement('input');
                    csrfField.setAttribute('type', 'hidden');
                    csrfField.setAttribute('name', '_token');
                    csrfField.setAttribute('value', $('meta[name="csrf-token"]').attr('content'));
                    form.appendChild(csrfField);

                    let methodField = document.createElement('input');
                    methodField.setAttribute('type', 'hidden');
                    methodField.setAttribute('name', '_method');
                    methodField.setAttribute('value', 'PUT');
                    form.appendChild(methodField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        function handleDelete(id) {
            new Swal({
                title: "Hapus Pembelajaran",
                text: "Apakah Anda yakin ingin melakukan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-danger text-white",
                    cancelButton: "btn btn-secondary ms-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = `{{ route('course.destroy', ['courseId']) }}`.replace('courseId', id);
                    let form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', url);

                    let csrfField = document.createElement('input');
                    csrfField.setAttribute('type', 'hidden');
                    csrfField.setAttribute('name', '_token');
                    csrfField.setAttribute('value', $('meta[name="csrf-token"]').attr('content'));
                    form.appendChild(csrfField);

                    let methodField = document.createElement('input');
                    methodField.setAttribute('type', 'hidden');
                    methodField.setAttribute('name', '_method');
                    methodField.setAttribute('value', 'DELETE');
                    form.appendChild(methodField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        function handleContinue(id) {
            new Swal({
                title: "Lanjutkan Pembelajaran",
                text: "Apakah Anda yakin ingin melakukan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-warning text-white",
                    cancelButton: "btn btn-secondary ms-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = `{{ route('course.continue', ['courseId']) }}`.replace('courseId', id);
                    let form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', url);

                    let csrfField = document.createElement('input');
                    csrfField.setAttribute('type', 'hidden');
                    csrfField.setAttribute('name', '_token');
                    csrfField.setAttribute('value', $('meta[name="csrf-token"]').attr('content'));
                    form.appendChild(csrfField);

                    let methodField = document.createElement('input');
                    methodField.setAttribute('type', 'hidden');
                    methodField.setAttribute('name', '_method');
                    methodField.setAttribute('value', 'PUT');
                    form.appendChild(methodField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        function handleMarkAsCompleted(id) {
            new Swal({
                title: "Tandai Selesai",
                text: "Apakah Anda yakin ingin melakukan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-warning text-white",
                    cancelButton: "btn btn-secondary ms-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = `{{ route('course.complete', ['courseId']) }}`.replace('courseId', id);
                    let form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', url);

                    let csrfField = document.createElement('input');
                    csrfField.setAttribute('type', 'hidden');
                    csrfField.setAttribute('name', '_token');
                    csrfField.setAttribute('value', $('meta[name="csrf-token"]').attr('content'));
                    form.appendChild(csrfField);

                    let methodField = document.createElement('input');
                    methodField.setAttribute('type', 'hidden');
                    methodField.setAttribute('name', '_method');
                    methodField.setAttribute('value', 'PUT');
                    form.appendChild(methodField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const rows = document.querySelectorAll('#lecturer-table tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');

                cells.forEach((cell, index) => {
                    if (index !== cells.length - 1) {
                        cell.addEventListener('click', () => {
                            const url = row.getAttribute('data-href');
                            if (url) {
                                window.location.href = url;
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush

