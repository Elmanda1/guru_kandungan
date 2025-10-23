<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function search(Request $request)
    {
        try {
            $searchQuery = $request->input('query');
            $statusFilter = $request->input('status');

            $courses = Course::whereHas('courseParticipants', function ($query) {
                $query->where('participant_id', auth()->id());
            });

            if ($statusFilter === 'done') {
                $courses->where('status', Course::STATUS_DONE);
            } else {
                $courses->where('status', Course::STATUS_AVAILABLE);
            }

            if ($searchQuery) {
                $courses->where(function ($query) use ($searchQuery) {
                    $query->where('title', 'LIKE', "%{$searchQuery}%")
                          ->orWhereHas('lecturer', function ($q) use ($searchQuery) {
                              $q->where('name', 'LIKE', "%{$searchQuery}%");
                          });
                });
            }
        
            $results = $courses->latest()->get();

            return view('my-course._course_list', ['courses' => $results]);
        } catch (Exception $exception) {
            Log::error('Search error: ' . $exception->getMessage());
            return view('my-course._course_list', ['courses' => collect()]);
        }
    }

    public function detail($slug)
    {
        return view('my-course.detail', [
            'title' => __('Course Detail'),
            'course' => Course::where('slug', $slug)->firstOrFail(),
        ]);
    }
}