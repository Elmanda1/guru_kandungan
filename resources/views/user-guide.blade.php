@extends('layouts.default')

@section('content')
    <main id="user-guide" class="py-5 mt-5">
        <div class="container px-lg-5">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="fw-bold text-primary mb-3">Panduan Pengguna</h2>
                    <p class="text-muted mx-auto" style="max-width: 700px;">
                        Pelajari cara menggunakan platform Guru Kandungan melalui rangkaian video panduan di bawah ini untuk pengalaman pembelajaran yang lebih optimal.
                    </p>
                </div>
            </div>

            <div class="row row-gap-4">
                @php
                    $videos = [
                        ['id' => 'x65B0uWjMig', 'title' => 'Panduan Registrasi dan Login'],
                        ['id' => 'qVH_7WCFMqA', 'title' => 'Panduan Melengkapi Profil'],
                        ['id' => '8lmLf7aMmDA', 'title' => 'Panduan Mencari dan Mendaftar Kursus'],
                        ['id' => '8UVITSDp7PQ', 'title' => 'Panduan Mengikuti Sesi Pembelajaran'],
                        ['id' => 'yShnnXw_QzY', 'title' => 'Panduan Mengunduh Sertifikat']
                    ];
                @endphp

                @foreach($videos as $video)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                            <div class="card-body p-0">
                                <div class="ratio ratio-16x9">
                                    <iframe 
                                        src="https://www.youtube.com/embed/{{ $video['id'] }}" 
                                        title="{{ $video['title'] }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        referrerpolicy="strict-origin-when-cross-origin" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="p-3">
                                    <h6 class="fw-bold text-dark mb-1">{{ $video['title'] }}</h6>
                                    <small class="text-muted">Video Tutorial</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <style>
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important;
        }
        .transition {
            transition: all 0.3s ease-in-out;
        }
        #user-guide {
            min-height: 80vh;
        }
    </style>
@endsection
