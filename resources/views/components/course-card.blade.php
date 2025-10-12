<div class="card h-100">
    @if($course->isAvailable())
        @if($course->isRegistered())
            <div class="ribbon"><span>Terdaftar</span></div>
        @else
            @if($course->isFull())
                <div class="ribbon secondary"><span>Penuh</span></div>
            @else
                <div class="ribbon"><span>Tersedia</span></div>
            @endif
        @endif
    @elseif($course->isDone())
        <div class="ribbon secondary"><span>Selesai</span></div>
    @elseif($course->isCancelled())
        <div class="ribbon danger"><span>Dibatalkan</span></div>
    @endif

    <div class="card-header border-0 py-3"
         style="background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('assets/images/course-background.jpg') }}');background-position: left">
        <div class="text-center text-white">
            <img class="rounded-pill"
                 src="{{ $course->lecturer->getPhotoUrl() }}"
                 alt="Photo" height="125">
            <p class="m-0 mt-2 fw-medium">{{ Str::words($course->lecturer->name, 2, '') }}</p>
            <p class="small m-0">Pembicara</p>
        </div>
    </div>

    <div class="card-body">
        <h5 class="card-title" style="font-size: 21px">
            {{ Str::limit($course->title, 33, '...') }}
        </h5>
    </div>

    <div
            class="card-footer pt-0 d-flex flex-column justify-content-end">
        <div class="small">
            <x-fas-user-graduate class="pb-1 text-primary" height="20" width="20"/>
            {{ Str::words($course->lecturer->name, 2, '') }}
        </div>

        <div class="small mt-2">
            <x-fas-calendar class="pb-1 text-primary" height="20" width="20"/>
            {{ Carbon::parse($course->date)->translatedFormat('l, d F Y') }}
        </div>

        <div class="small mt-2">
            <x-fas-clock class="pb-1 text-primary" height="20" width="20"/>
            {{ substr($course->start_time, 0, 5) }} - Selesai
        </div>
    </div>
</div>

