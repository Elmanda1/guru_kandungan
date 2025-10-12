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
                                @if($course->remainingQuota != 0 || $course->isDone())
                                    <button class="btn btn-primary w-100"
                                            onclick="handleRegister({{ $course->id }})"
                                    >
                                        Daftar
                                    </button>
                                @else
                                    <x-alert.info message="Pendaftaran sudah penuh"/>
                                @endif
                            @endif
                        @else
                            <x-alert.danger message="Pembelajaran dibatalkan"/>
                        @endif
                    @endif
                </x-course-detail>
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
    </script>
@endpush
