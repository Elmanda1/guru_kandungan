<?php

namespace App\Http\Controllers;

use App\Models\Course;

class MyCourseController extends Controller
{
    public function list()
    {
        $search = request()->input('s');

        $query = Course::whereHas('courseParticipants', function ($query) {
            $query->where('participant_id', auth()->id());
        });

        if (request()->has('done')) {
            $query->where('status', Course::STATUS_DONE);
        } else {
            $query->where('status', Course::STATUS_AVAILABLE);
        }

        if ($search) {
            $query->where('title', 'like', '%'.$search.'%');
        }

        return view('my-course.list', [
            'title' => __('My Course'),
            'search' => $search,
            'courses' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function detail($slug)
    {
        return view(' my-course.detail', [
            'title' => __('Course Detail'),
            'course' => Course::where('slug', $slug)->firstOrFail(),
        ]);
    }
}
