@extends('layouts.app')

@push('style')
    <style>
        #participant-table tbody tr {
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
                        <a href="{{ route('participant.create') }}"
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
                        <table class="table m-0 align-middle table-hover" id="participant-table">
                            <thead>
                            <tr>
                                <th class="bg-body-tertiary text-center" scope="col" width="5%">No</th>
                                <th class="bg-body-tertiary" scope="col">Nama Lengkap</th>
                                <th class="bg-body-tertiary" scope="col">Email</th>
                                <th class="bg-body-tertiary" scope="col">Tanggal Vertifikasi Email</th>
                                <th class="bg-body-tertiary" scope="col" width="15%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($participants) && $participants->count() > 0)
                                @foreach($participants as $index => $participant)
                                    <tr class="align-middle" data-href="{{ route('participant.show', $participant) }}">
                                        <th class="text-nowrap text-center">{{ $index + $participants->firstItem() }}</th>
                                        <td class="text-nowrap">
                                            <div class="d-flex">
                                                <img class="avatar avatar-md me-3"
                                                     src="{{ $participant->getPhotoUrl() }}"
                                                     alt="{{ $participant->name }}"
                                                >
                                                <div class="d-flex flex-column">
                                                    <span>{{ $participant->name }}</span>
                                                    <div>
                                                        <span class="small border border-info badge text-info">
                                                            {{ $participant->getRolenames()->first() }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-nowrap">{{ $participant->email }}</td>
                                        <td class="text-nowrap">{{ $participant->formattedEmailVerifiedAt }}</td>
                                        <td class="text-nowrap text-end">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ route('impersonate', $participant->id) }}"
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

                                                        @if($participant->email_verified_at == null)
                                                            <li>
                                                                <button class="text-decoration-none fw-bold text-success d-flex align-items-center gap-2 dropdown-item"
                                                                   onclick="handleEmailVerification({{ $participant->id }})"
                                                                >
                                                                    <x-heroicon-o-shield-check
                                                                        style="height: 20px;width: 20px"/>
                                                                    Verifikasi Email
                                                                </button>
                                                            </li>
                                                        @endif

                                                        @if($participant->email_verified_at == null)
                                                            <li>
                                                                <div class="dropdown-divider"></div>
                                                            </li>
                                                        @endif

                                                        <li>
                                                            <a class="text-decoration-none fw-bold d-flex align-items-center gap-2 dropdown-item text-secondary"
                                                               href="{{ route('participant.show', $participant->id) }}"
                                                            >
                                                                <x-heroicon-m-eye
                                                                    style="height: 20px;width: 20px"/>
                                                                Lihat
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a class="text-decoration-none fw-bold d-flex align-items-center gap-2 dropdown-item text-secondary"
                                                               href="{{ route('participant.edit', $participant->id) }}"
                                                            >
                                                                <x-heroicon-m-pencil-square
                                                                    style="height: 20px;width: 20px"/>
                                                                Ubah
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <button
                                                                class="text-decoration-none fw-bold text-danger d-flex align-items-center gap-2 dropdown-item"
                                                                onclick="handleDelete({{ $participant->id }})"
                                                            >
                                                                <x-heroicon-m-trash
                                                                    style="height: 20px;width: 20px"/>
                                                                Hapus
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </a>
                                @endforeach
                            @else
                                <tr class="align-middle">
                                    <td class="text-center py-3" colspan="5">
                                        {{ __('No Data Available in Table') }}
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $participants->links() }}
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
                title: "Hapus Peserta",
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
                    let url = `{{ route('participant.destroy', ['']) }}/${id}`;
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
                    let url = `{{ route('verification.manual', ['participantId']) }}`.replace('participantId', id);
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
            const rows = document.querySelectorAll('#participant-table tbody tr');

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
