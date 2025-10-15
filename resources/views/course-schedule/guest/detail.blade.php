@extends('layouts.default')

@section('content')
    <x-section.page-title title="{{ $title }}"/>

    <main id="course-schedule-detail">
        <section class="py-5">
            <div class="container">
                <x-course-detail :course="$course">
                    @auth
                        @if(auth()->user()->isParticipant())
                            @if(!$course->isCancelled())
                                @if($course->isRegistered())
                                    @if(!$course->isDone())
                                        <a class="btn btn-primary w-100" href="{{ route('my-course.list') }}">
                                            Cek Pembelajaran Saya
                                        </a>

                                        <button class="btn btn-danger text-white mt-2 w-100"
                                                onclick="handleCancel({{ $course->id }})"
                                        >
                                            Batalkan Pendaftaran
                                        </button>
                                    @else
                                        <a class="btn btn-primary w-100" href="{{ route('my-course.list') }}">
                                            Cek Pembelajaran Saya
                                        </a>
                                    @endif
                                @else
                                    @if($course->remainingQuota != 0 && !$course->isDone())
                                        <button class="btn btn-primary w-100"
                                                onclick="handleRegister({{ $course->id }})"
                                        >
                                            Daftar
                                        </button>
                                    @elseif($course->isDone())
                                        <x-alert.info message="Pembelajaran sudah selesai"/>
                                    @else
                                        <x-alert.info message="Pendaftaran sudah penuh"/>
                                    @endif
                                @endif
                            @else
                                <x-alert.danger message="Pembelajaran dibatalkan"/>
                            @endif
                        @endif
                    @else
                        {{-- Tampilkan tombol untuk guest (belum login) --}}
                        @if(!$course->isCancelled() && !$course->isDone())
                            @if($course->remainingQuota != 0)
                                <button class="btn btn-primary w-100" onclick="handleGuestRegister()">
                                    Daftar
                                </button>
                                <p class="text-muted text-center mt-2 mb-0" style="font-size: 0.875rem;">
                                    <i class="bi bi-info-circle"></i> Silakan login terlebih dahulu untuk mendaftar
                                </p>
                            @else
                                <x-alert.info message="Pendaftaran sudah penuh"/>
                            @endif
                        @elseif($course->isDone())
                            <x-alert.info message="Pembelajaran sudah selesai"/>
                        @else
                            <x-alert.danger message="Pembelajaran dibatalkan"/>
                        @endif
                    @endauth
                </x-course-detail>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script>
        function copyLink(element) {
            const input = document.querySelector(element);
            input.select();
            input.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(input.value);
            alert("Link berhasil disalin: " + input.value);
        }

        function handleGuestRegister() {
            new Swal({
                title: "Login Diperlukan",
                text: "Anda harus login terlebih dahulu untuk mendaftar pembelajaran ini.",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "Login Sekarang",
                cancelButtonText: "Batal",
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-secondary ms-2"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman login dengan intended URL
                    window.location.href = "{{ route('auth.login') }}?redirect=" + encodeURIComponent(window.location.href);
                }
            });
        }

        function handleRegister(id) {
            new Swal({
                title: "Lakukan Pendaftaran",
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
                    let url = `{{ route('course-schedule.register', ['courseScheduleId']) }}`.replace('courseScheduleId', id);
                    let form = document.createElement('form');
                    form.setAttribute('method', 'post');
                    form.setAttribute('action', url);

                    let csrfField = document.createElement('input');
                    csrfField.setAttribute('type', 'hidden');
                    csrfField.setAttribute('name', '_token');
                    csrfField.setAttribute('value', $('meta[name="csrf-token"]').attr('content'));
                    form.appendChild(csrfField);

                    document.body.appendChild(form);
                    form.submit();
                } else {
                    swal.close();
                }
            });
        }

        function handleCancel(id) {
            new Swal({
                title: "Batalkan Pendaftaran",
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
                    let url = `{{ route('course-schedule.cancel', ['courseScheduleId']) }}`.replace('courseScheduleId', id);
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
    </script>
@endpush