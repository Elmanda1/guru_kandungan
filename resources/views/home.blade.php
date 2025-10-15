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
        <section id="introduction" 
    class="d-flex align-items-center py-6" 
    style="font-family: 'Poppins', sans-serif;">

<div class="container px-lg-5 mb-4">
    <div class="row align-items-center">

        <!-- Text Section -->
        <div class="col-12 col-lg-7" style="animation: fadeInLeft 1.2s ease;">
            <div class="heading">
                <div class="d-flex flex-column mb-2" style="border-left: 5px solid #004aad; padding-left: 18px;">
                    <span class="fw-bold" 
                          style="letter-spacing: 2px; font-size: 36px; text-transform: uppercase; 
                                 font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif;
                                 color: #0056b3;">
                        Guru Kandungan
                    </span>
                    <small class="ms-0 ms-lg-1" 
                           style="font-size: 14px; font-weight: 500; margin-top: 4px;
                                  color: #64748b; line-height: 1.5;
                                  font-family: 'Inter', system-ui, sans-serif;">
                        Oleh Departemen Obstetri dan Ginekologi, Fakultas Kedokteran Universitas Airlangga
                    </small>
                </div>
                <h1 class="fw-semibold pt-4"
                    style="font-size: 24px; line-height: 1.4; color: #2c3e50; 
                           letter-spacing: 0.5px;
                           font-family: 'Poppins', 'Segoe UI', sans-serif;
                           margin: 0;">
                    Education Without <span style="color: #0056b3; font-weight: 600;">Walls</span>
                </h1>
            </div>
            <p class="mb-4" 
               style="font-size: 17px; color: #475569; line-height: 1.9; max-width: 92%;
                      font-family: 'Inter', system-ui, sans-serif; font-weight: 400;">
                Platform pembelajaran interaktif yang menghadirkan edukasi seputar 
                kesehatan reproduksi wanita — dirancang untuk memperluas wawasan, 
                meningkatkan kesadaran, dan membangun generasi yang lebih sehat.
            </p>
        </div>

        <!-- Image Section -->
        <div class="col-12 col-lg-5">
            <img src="https://gurukandungan.id/assets/images/banner.png"
                 class="img-fluid" width="600" style="animation: fadeInImage 1.8s ease forwards;">
        </div>
    </div>
</div>
    <!-- Animations -->
    <style>
        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-60px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInImage {
            0% { opacity: 0; transform: scale(0.95) translateY(0); }
            100% { opacity: 1; transform: scale(1) translateY(0); }
        }
    </style>
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
