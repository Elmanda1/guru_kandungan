@extends('layouts.app')

@section('content')
    <div class="row row-gap-24">
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12">
                    <x-section.app.page-title title="{{ $title }}"/>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card border-0 bg-transparent">
                <div class="card-header border-0 px-0 bg-transparent">
                    <div class="text-center mb-3">
                        <a href="{{ url()->current() }}"
                           class="btn btn-outline-primary me-1 {{ !request()->has('done') ? 'active' : '' }}">Belum
                            Tayang</a>
                        <a href="{{ url()->current() }}?done"
                           class="btn btn-outline-primary {{ request()->has('done') ? 'active' : '' }}">Sudah Tayang</a>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="w-100">
                            <form action="{{ url()->current() }}" method="get">
                                <input type="text"
                                       class="form-control w-100"
                                       name="s"
                                       placeholder="Cari"
                                       style="width: 255px"
                                       value="{{ $search }}"
                                >
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 border-0 bg-transparent">
                    <div class="row row-gap-48">
                        @if(!empty($courses) && $courses->count() > 0)
                            @foreach($courses as  $course)
                                <div class="col-12 col-md-4 col-xl-3">
                                    <a href="{{ route('course-schedule.app-detail', $course->slug) }}" class="text-decoration-none">
                                        <x-course-card :course="$course"/>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center my-5">
                                <img src="{{ asset('assets/images/flat/not-found.png') }}" width="250"
                                     alt="Not Found"/>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-footer bg-transparent">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
