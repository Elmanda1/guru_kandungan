<?php

namespace App\Http\Controllers;

use App\Jobs\CourseEnrollmentMailJob;
use App\Jobs\CourseStartMailJob;
use App\Jobs\ZoomOpenedMailJob;
use App\Models\Course;
use App\Models\CourseParticipant;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseScheduleController extends Controller
{
    public function guestList()
    {
        $search = request()->input('s');

        $query = Course::query();

        if (request()->has('done')) {
            // Tampilkan semua course dengan status DONE
            $query->where('status', Course::STATUS_DONE);
        } else {
            // TAMPILKAN ACARA YANG MASIH AVAILABLE DAN TERMASUK HARI INI (belum lewat hari ini)
            $query->where('status', Course::STATUS_AVAILABLE)
                  ->whereDate('date', '>=', Carbon::today());
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%'.$search.'%')
                  ->orWhereHas('lecturer', function ($subq) use ($search) {
                      $subq->where('name', 'like', '%'.$search.'%');
                  });
            });
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
            // Tampilkan semua course dengan status DONE
            $query->where('status', Course::STATUS_DONE);
        } else {
            // HANYA TAMPILKAN ACARA YANG MASIH AVAILABLE DAN BELUM LEWAT
            $query->where('status', Course::STATUS_AVAILABLE)
                  ->where('date', '>=', Carbon::now());
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%'.$search.'%')
                  ->orWhereHas('lecturer', function ($subq) use ($search) {
                      $subq->where('name', 'like', '%'.$search.'%');
                  });
            });
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

    public function search(Request $request)
    {
        try {
            $searchQuery = $request->input('query');
            $statusFilter = $request->input('status');

            $courses = Course::query();

            if ($statusFilter === 'done') {
                // Tampilkan semua course dengan status DONE
                $courses->where('status', Course::STATUS_DONE);
            } else {
                // Default ke 'available' dan filter yang belum lewat waktu
                $courses->where('status', Course::STATUS_AVAILABLE)
                        ->where('date', '>=', Carbon::now());
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

            return view('course-schedule.guest._course_list', ['courses' => $results]);
        } catch (Exception $exception) {
            Log::error('Search error: ' . $exception->getMessage());
            return view('course-schedule.guest._course_list', ['courses' => collect()]);
        }
    }
        
    public function openZoom($courseId)
    {
        $course = Course::findOrFail($courseId);
    
        // Cek apakah sudah pernah dibuka
        if ($course->zoom_opened_at) {
            session()->flash('info', __('Emails have already been sent for this course'));
            return redirect()->back();
        }
    
        $course->update(['zoom_opened_at' => now()]);

   //     foreach ($participants as $participant) {
   //         ZoomOpenedMailJob::dispatch($participant->user, $course);
   //     }
        
        session()->flash('success', __('Emails successfully dispatched'));
        return redirect()->back();
    }
}