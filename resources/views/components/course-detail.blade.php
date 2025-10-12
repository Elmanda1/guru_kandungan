<div class="row row-gap-24">
    <div class="col-12 col-lg-8 offset-lg-2">
        <div class="card-header border-0 py-3"
             style="background-repeat: no-repeat; background-size: cover; background-image: url({{ asset('assets/images/course-background.jpg') }})">
            <div class="text-center text-white">
                <div class="row row-gap-32">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <img class="rounded-pill"
                             src="{{ $course->lecturer->getPhotoUrl() }}"
                             alt="Photo" height="150"
                        >
                        <p class="m-0 mt-2 fw-medium">{{ $course->lecturer->name }}</p>
                        <p class="small m-0 mb-2">Pembicara</p>
                        <p class="small m-0 fst-italic">{{ $course->lecturer->cv }}</p>
                    </div>
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-8 offset-lg-2">
        @foreach([
                              ['icon' => 'fas fa-book', 'label' => 'Judul', 'value' => $course->title],
                              ['icon' => 'fas fa-book', 'label' => 'Topik', 'value' => $course->topic?->name],
                              ['icon' => 'fas fa-graduation-cap', 'label' => 'Jenjang Pendidikan', 'value' => $course->courseEducationLevels->pluck('educationLevel.name')->join(', ')],
                              ['icon' => 'fas fa-info-circle', 'label' => 'Deskripsi', 'value' => $course->description],
                              ['icon' => 'far fa-calendar', 'label' => 'Tanggal', 'value' => Carbon::parse($course->date)->translatedFormat('l, d F Y')],
                              ['icon' => 'far fa-clock', 'label' => 'Waktu', 'value' => substr($course->start_time, 0, 5) . ' - Selesai'],
                              ['icon' => 'fas fa-users', 'label' => 'Kuota', 'value' => $course->is_done ? '-' : $course->quota . ' Peserta'],
                              ['icon' => 'fas fa-users', 'label' => 'Sisa Kuota', 'value' => $course->is_done ? '-' : $course->remainingQuota . ' Peserta'],
                         ] as $detail)
            <div class="mt-2">
                <div class="border-bottom py-1">
                    <div class="row mb-1">
                        <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                            <i class="{{ $detail['icon'] }} text-primary"></i>
                            <span class="fw-semibold">{{ $detail['label'] }}</span>
                        </div>
                        <div class="col-1 d-none d-lg-block p-0 text-center">:</div>
                        <div class="col-12 col-lg-7">
                            {{ $detail['value'] }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-2">
            <div class="py-1">
                <div class="row mb-1">
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                        <i class="fas fa-link text-primary"></i>
                        <span class="fw-semibold">Bagikan Jadwal</span>
                    </div>
                    <div class="col-1 d-none d-lg-block p-0 text-center">:</div>
                    <div class="col-12 col-lg-7">
                        <div class="d-flex align-items-center gap-2 small">
                            <input type="text" class="form-control form-control-sm"
                                   value="{{ route('course-schedule.app-detail', $course->slug) }}"
                                   id="share-link" readonly>
                            <button class="btn btn-outline-primary btn-sm"
                                    onclick="copyLink('#share-link')">
                                Salin
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
