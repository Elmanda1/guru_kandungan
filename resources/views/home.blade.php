@extends('layouts.default')

@push('style')
    <link rel="stylesheet"
          type="text/css"
          href="{{ asset('assets/css/evo-calendar.min.css') }}">
    <link rel="stylesheet"
          type="text/css"
          href="{{ asset('assets/css/evo-calendar.royal-navy.min.css') }}">
@endpush

@section('content')
    <main id="home">
        <section id="introduction">
            <div class="container px-lg-5">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="mb-3 heading">
                            <div class="d-flex flex-column">
                                <span class="text-primary">Guru Kandungan</span>
                                <small class="text-primary small ms-0 ms-lg-1" style="font-size: 13px">
                                    By Departemen Obstetri dan Ginekologi FK Universitas Airlangga
                                </small>
                            </div>
                            <span class="fs-2">Education Without Wall</span>
                        </div>
                        <p class="lead mb-4">
                            Platform Belajar Online Tentang Kesehatan Reproduksi Wanita.
                        </p>
                    </div>
                    <div class="col-12 col-lg-5">
                        <img src="https://gurukandungan.id/assets/images/banner.png"
                             class="img-fluid" width="600">
                    </div>
                </div>
            </div>
        </section>

        <section id="benefit" class="bg-primary py-5 text-light">
            <div class="container-fluid px-lg-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="mb-5 text-uppercase text-warning fw-bold">Manfaat Yang Didapatkan</h4>
                    </div>
                    <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                        <x-fas-lightbulb width="66" height="66" class="mb-3"/>
                        <p class="px-5">Materi Sesuai Standard Kompetensi</p>
                    </div>
                    <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                        <x-fas-user-doctor width="66" height="66" class="mb-3"/>
                        <p class="px-5">Narasumber Oleh Dosen Fakultas Kedokteran UNAIR</p>
                    </div>
                    <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center">
                        <x-fas-calendar width="66" height="66" class="mb-3"/>
                        <p class="px-5">Pilihan Jadwal Belajar Yang Beragam</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="upcoming-course-schedules" class="py-5" style="margin: 68px 0">
            <div class="container px-lg-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="mb-5 text-primary text-uppercase fw-bold">Jadwal Pembelajaran</h4>
                    </div>
                    <div class="col-12">
                        <div class="border shadow-none" id="calendar"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
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
