@extends('layouts.app')

@push('style')
    <style>
        #lecturer-table tbody tr {
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <div class="row row-gap-24">
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12 col-lg-6">
                    <x-section.app.page-title title="{{ $title }}"/>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="text-lg-end">
                        <a href="{{ route('lecturer.create') }}"
                           class="btn btn-primary"
                        >
                            Tambah
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <form action="{{ url()->current() }}" method="get">
                            <input type="text"
                                   class="form-control"
                                   name="s"
                                   placeholder="Cari"
                                   style="width: 255px"
                                   value="{{ $search }}"
                            >
                        </form>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0 align-middle table-hover" id="lecturer-table">
                            <thead>
                            <tr>
                                <th class="bg-body-tertiary text-nowrap text-center" scope="col" width="5%">No</th>
                                <th class="bg-body-tertiary text-nowrap" scope="col">Nama Lengkap</th>
                                <th class="bg-body-tertiary text-nowrap" scope="col">Email</th>
                                <th class="bg-body-tertiary text-nowrap text-center" scope="col">Verifikasi</th>
                                <th class="bg-body-tertiary text-nowrap" scope="col">Tanggal Vertifikasi Email</th>
                                <th class="bg-body-tertiary text-nowrap" scope="col" width="15%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($lecturers) && $lecturers->count() > 0)
                                @foreach($lecturers as $index => $lecturer)
                                    <tr class="align-middle" data-href="{{ route('lecturer.show', $lecturer) }}">
                                        <th class="text-nowrap text-center">{{ $index + $lecturers->firstItem() }}</th>
                                        <td class="text-nowrap">
                                            <div class="d-flex">
                                                <img class="avatar avatar-md me-3"
                                                     src="{{ $lecturer->getPhotoUrl() }}"
                                                     alt="{{ $lecturer->name }}"
                                                >
                                                <div class="d-flex flex-column">
                                                    <span>{{ $lecturer->name }}</span>
                                                    <div>
                                                        <span class="small border border-info badge text-info">
                                                            {{ $lecturer->getRolenames()->first() }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">{{ $lecturer->email }}</td>
                                        <td class="text-nowrap text-center">
                                            @if($lecturer->is_verified)
                                                <x-heroicon-o-check-circle width="24" height="24" class="text-success"/>
                                            @else
                                                <x-heroicon-o-x-circle width="24" height="24" class="text-danger"/>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">{{ $lecturer->formattedEmailVerifiedAt }}</td>
                                        <td class="text-nowrap text-end">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('impersonate', $lecturer->id) }}"
                                                   class="text-decoration-none fw-semibold text-primary d-flex align-items-center gap-1">
                                                    <x-heroicon-o-user height="20" width="20"/>
                                                    Cek Akun
                                                </a>

                                                <div class="dropdown d-flex">
                                                    <a class="text-decoration-none fw-bold text-primary d-flex align-items-center gap-1"
                                                       href="#"
                                                       role="button"
                                                       data-coreui-toggle="dropdown" aria-expanded="false"
                                                    >
                                                        <x-heroicon-c-ellipsis-vertical
                                                            style="height: 20px;width: 20px"/>
                                                    </a>

                                                    <ul class="dropdown-menu mt-2"
                                                        style="font-size: 14px; min-width: 200px">

                                                        @if($lecturer->email_verified_at == null)
                                                            <li>
                                                                <button class="text-decoration-none fw-bold text-success d-flex align-items-center gap-2 dropdown-item"
                                                                   onclick="handleEmailVerification({{ $lecturer->id }})"
                                                                >
                                                                    <x-heroicon-o-shield-check
                                                                        style="height: 20px;width: 20px"/>
                                                                    Verifikasi Email
                                                                </button>
                                                            </li>
                                                        @endif

                                                        @if($lecturer->is_verified == false)
                                                            <li>
                                                                <button
                                                                    class="text-decoration-none fw-bold text-success d-flex align-items-center gap-2 dropdown-item"
                                                                    onclick="handleVerification({{ $lecturer->id }})"
                                                                >
                                                                    <x-heroicon-o-shield-check
                                                                        style="height: 20px;width: 20px"/>
                                                                    Verifikasi Dosen
                                                                </button>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <button
                                                                    class="text-decoration-none fw-bold text-warning d-flex align-items-center gap-2 dropdown-item"
                                                                    onclick="handleUnverification({{ $lecturer->id }})"
                                                                >
                                                                    <x-heroicon-o-shield-exclamation
                                                                        style="height: 20px;width: 20px"/>
                                                                    Nonaktifkan Verifikasi
                                                                </button>
                                                            </li>
                                                        @endif

                                                        <li>
                                                            <div class="dropdown-divider"></div>
                                                        </li>

                                                        <li>
                                                            <a class="text-decoration-none fw-bold d-flex align-items-center gap-2 dropdown-item text-secondary"
                                                               href="{{ route('lecturer.show', $lecturer->id) }}"
                                                            >
                                                                <x-heroicon-m-eye
                                                                    style="height: 20px;width: 20px"/>
                                                                Lihat
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a class="text-decoration-none fw-bold d-flex align-items-center gap-2 dropdown-item text-secondary"
                                                               href="{{ route('lecturer.edit', $lecturer->id) }}"
                                                            >
                                                                <x-heroicon-m-pencil-square
                                                                    style="height: 20px;width: 20px"/>
                                                                Ubah
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <button
                                                                class="text-decoration-none fw-bold text-danger d-flex align-items-center gap-2 dropdown-item"
                                                                onclick="handleDelete({{ $lecturer->id }})"
                                                            >
                                                                <x-heroicon-m-trash style="height: 20px;width: 20px"/>
                                                                Hapus
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="align-middle">
                                    <td class="text-center py-3" colspan="6">
                                        {{ __('No Data Available in Table') }}
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $lecturers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {!! session('script') !!}

    <script>
        function handleDelete(id) {
            new Swal({
                title: "Hapus Dosen",
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
                    let url = `{{ route('lecturer.destroy', ['lectureId']) }}`.replace('lectureId', id);
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

        function handleEmailVerification(id) {
            new Swal({
                title: "Verifikasi Email",
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
                    let url = `{{ route('verification.manual', ['lectureId']) }}`.replace('lectureId', id);
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

        function handleVerification(id) {
            new Swal({
                title: "Verifikasi Dosen",
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
                    let url = `{{ route('lecturer.verify', ['lectureId']) }}`.replace('lectureId', id);
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

        function handleUnverification(id) {
            new Swal({
                title: "Nonaktifkan Verifikasi",
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
                    let url = `{{ route('lecturer.unverified', ['lectureId']) }}`.replace('lectureId', id);
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
