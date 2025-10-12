<?php

namespace App\Http\Controllers;

use App\Jobs\CourseEnrollmentMailJob;
use App\Models\Course;
use App\Models\CourseParticipant;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseScheduleController extends Controller
{
    public function guestList()
    {
        $search = request()->input('s');

        $query = Course::query();

        if (request()->has('done')) {
            $query->where('status', Course::STATUS_DONE);
        } else {
            $query->where('status', Course::STATUS_AVAILABLE);
        }

        if ($search) {
            $query->where('title', 'like', '%'.$search.'%');
        }

        return view('course-schedule.guest.list', [
            'title' => __('Course Schedule'),
            'search' => $search,
            'courses' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function guestDetail($slug)
    {
        return view('course-schedule.guest.detail', [
            'title' => __('Course Detail'),
            'course' => Course::where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function appList()
    {
        $search = request()->input('s');

        $query = Course::query();

        if (request()->has('done')) {
            $query->where('status', Course::STATUS_DONE);
        } else {
            $query->where('status', Course::STATUS_AVAILABLE);
        }

        if ($search) {
            $query->where('title', 'like', '%'.$search.'%');
        }

        return view('course-schedule.app.list', [
            'title' => __('Course Schedule'),
            'search' => $search,
            'courses' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function appDetail($slug)
    {
        return view('course-schedule.app.detail', [
            'title' => __('Course Detail'),
            'course' => Course::where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function register(Course $course)
    {
        try {
            CourseParticipant::create([
                'participant_id' => auth()->user()->id,
                'course_id' => $course->id,
            ]);

            CourseEnrollmentMailJob::dispatch(auth()->user(), $course);

            if (request()->has('app')) {
                return redirect()->back()->with('success', 'Pendaftaran berhasil');
            }

            return redirect()->back()->with('alert_success', 'Pendaftaran berhasil');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            if (request()->has('app')) {
                return redirect()->back()->with('error', 'Gagal melakukan pendaftaran');
            }

            return redirect()->back()->with('alert_error', 'Gagal melakukan pendaftaran');
        }
    }

    public function cancel(Course $course)
    {
        try {
            CourseParticipant::where('participant_id', auth()->user()->id)
                ->where('course_id', $course->id)
                ->forceDelete();

            if (request()->has('app')) {
                return redirect()->back()->with('success', 'Pendaftaran berhasil dibatalkan');
            }

            return redirect()->back()->with('alert_success', 'Pendaftaran berhasil dibatalkan');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            if (request()->has('app')) {
                return redirect()->back()->with('error', 'Gagal membatalkan pendaftaran');
            }

            return redirect()->back()->with('alert_error', 'Gagal membatalkan pendaftaran');
        }
    }
}
