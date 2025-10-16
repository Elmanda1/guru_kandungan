@extends('layouts.app')

@section('content')
    <div class="row row-gap-24">
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12">
                    <x-section.app.page-title title="{{ $title }}"/>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="py-4">
                <x-course-detail :course="$course">
                    @if(!$course->isCancelled())
                        @if($course->isRegistered())
                            @if(!$course->isDone())
                                @if($course->isStarting())
                                    <a
                                        class="btn btn-primary w-100"
                                        href="{{ $course->zoom_link }}" target="_blank"
                                        >
                                        Belajar Sekarang
                                    </a>
                                        {{-- 🔽 Tombol sementara untuk kirim email --}}
                                 <button 
                                     class="btn btn-outline-primary mt-2 w-100"
                                     onclick="sendMail({{ $course->id }})"
                                 >
                                     Kirim Email Tes
                                 </button>

                                @endif

                                <button class="btn btn-danger text-white mt-2 w-100"
                                        onclick="handleCancel({{ $course->id }})"
                                >
                                    Batalkan Pendaftaran
                                </button>
                            @else
                                <button
                                    class="btn btn-primary w-100"
                                    data-coreui-toggle="modal"
                                    data-coreui-target="#youtube-modal"
                                >
                                    Review
                                </button>
                            @endif
                        @else
                            @if($course->remainingQuota != 0 || $course->isDone())
                                <button class="btn btn-primary w-100"
                                        onclick="handleRegister({{ $course->id }})"
                                >
                                    Daftar
                                </button>
                            @endif
                        @endif
                    @else
                        <x-alert.danger message="Pembelajaran dibatalkan"/>
                    @endif
                </x-course-detail>
            </div>
        </div>
    </div>

    <div class="modal fade" id="zoom-modal" tabindex="-1" aria-labelledby="zoom-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <img src="https://gurukandungan.id/assets/images/zoom-logo.png" alt="Zoom Logo" width="96">
                    </div>

                    <div class="mb-3">
                        <div class="fw-bold">Judul</div>
                        <div>{{ $course->title }}</div>
                    </div>

                    <div class="mb-3">
                        <div class="fw-bold">Link</div>
                        <a href="{{ $course->zoom_link }}" target="_blank">
                            <div>{{ $course->zoom_link }}</div>
                        </a>
                    </div>

                    <div class="mb-3">
                        <div class="fw-bold">ID</div>
                        <div>{{ $course->zoom_id }}</div>
                    </div>

                    <div class="mb-3">
                        <div class="fw-bold">Password</div>
                        <div>{{ $course->zoom_password }}</div>
                    </div>
                </div>
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
    <script>
        function copyLink(element) {
            const input = document.querySelector(element);
            input.select();
            input.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(input.value);
            alert("Link berhasil disalin: " + input.value);
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
                    let url = `{{ route('course-schedule.register', ['courseScheduleId']) }}`.replace('courseScheduleId', id) + '?app=true';
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
                    let url = `{{ route('course-schedule.cancel', ['courseScheduleId']) }}`.replace('courseScheduleId', id) + '?app=true';
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

function sendMail(courseId) {
    new Swal({
        title: "Kirim Email Zoom?",
        text: "Email notifikasi akan dikirim ke semua peserta course ini.",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Kirim Email",
        cancelButtonText: "Batal",
        buttonsStyling: false,
        customClass: {
            confirmButton: "btn btn-primary text-white",
            cancelButton: "btn btn-secondary ms-2"
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Buat form untuk POST request
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = `{{ route('course-schedule.open-zoom', ['courseId' => ':id']) }}`.replace(':id', courseId);
            
            // Tambahkan CSRF token
            let csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);
            
            // Submit form
            document.body.appendChild(form);
            form.submit();
        }
    });
}
    </script>
@endpush
