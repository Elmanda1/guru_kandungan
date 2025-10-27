@if(!empty($courses) && $courses->count() > 0)
    @foreach($courses as $course)
        <div class="col-12 col-md-4 col-xl-3">
            <a href="{{ route('my-course.detail', $course->slug) }}"
               class="text-decoration-none">
                <x-course-card :course="$course"/>
            </a>
        </div>
    @endforeach
@else
    <div class="col-12 text-center my-5">
        <img src="{{ asset('assets/images/flat/not-found.png') }}" width="250"
             alt="Not Found"/>
        <p class="mt-3">Tidak ada data ditemukan</p>
    </div>
@endif