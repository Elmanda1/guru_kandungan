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
    <div class="row row-gap-24">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <img class="avatar avatar-md me-3"
                             src="{{ auth()?->user()?->getPhotoUrl() }}"
                             alt="{{ auth()?->user()?->name }}"
                        >
                        <div class="d-flex flex-column">
                            <h2 class="fw-bold m-0" style="font-size: 16px">Selamat Datang</h2>
                            <p class="m-0" style="font-size: 14px">{{ auth()->user()->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="border shadow-none" id="calendar"></div>
        </div>
    </div>
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
