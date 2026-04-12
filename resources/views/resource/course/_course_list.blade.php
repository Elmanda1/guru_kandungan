@if(!empty($courses) && $courses->count() > 0)
    @foreach($courses as $index => $course)
        <div class="col-12 col-md-4 col-xl-3">
            <a href="{{ route('course.show', $course->id) }}"
               class="text-decoration-none">
                <x-course-card :course="$course"/>
            </a>
        </div>
    @endforeach
@else
    <div class="col-12 text-center my-5">
        <img src="{{ asset('assets/images/flat/not-found.png') }}" width="250" alt="Not Found"/>
    </div>
@endif
