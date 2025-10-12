<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CompleteRequest;
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;
use App\Jobs\CourseCancellationMailJob;
use App\Models\Course;
use App\Models\CourseEducationLevel;
use App\Models\EducationLevel;
use App\Models\Topic;
use App\Models\User;
use App\Services\CalendarEventService;
use DragonCode\Support\Facades\Helpers\Str;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function index()
    {
        $search = request()->input('s');

        $query = Course::query();

        if (auth()->user()->isLecturer()) {
            $query->where('lecturer_id', auth()->id());
        }

        if (request()->has('done')) {
            $query->where('status', Course::STATUS_DONE);
        } else {
            $query->where('status', Course::STATUS_AVAILABLE);
        }

        if ($search) {
            $query->where('title', 'like', '%'.$search.'%');
        }

        return view('resource.course.index', [
            'title' => __('Course List'),
            'search' => $search,
            'courses' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function create()
    {
        return view('resource.course.create', [
            'title' => __('Add Course'),
            'topics' => Topic::all(),
            'educationLevels' => EducationLevel::all(),
            'lecturers' => User::whereRelation('roles', 'name', '=', 'lecturer')->get(),
            'courseCalendarEvents' => (new CalendarEventService)->getCalendarEvents('app'),
        ]);
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            $course = Course::create([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'description' => $validatedData['description'],
                'date' => $validatedData['date'],
                'start_time' => $validatedData['start_time'],
                'quota' => $validatedData['quota'],
                'status' => Course::STATUS_AVAILABLE,
                'zoom_link' => $validatedData['zoom_link'],
                'zoom_id' => $validatedData['zoom_id'],
                'zoom_password' => $validatedData['zoom_password'],
                'topic_id' => $validatedData['topic_id'],
                'lecturer_id' => $validatedData['lecturer_id'],
            ]);

            foreach ($validatedData['education_level_ids'] as $id) {
                CourseEducationLevel::create([
                    'course_id' => $course->id,
                    'education_level_id' => $id,
                ]);
            }

            DB::commit();

            session()->flash('success', __('Course successfully added'));

            return redirect()->route('course.index');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            DB::rollBack();

            session()->flash('error', __('Failed to add course'));

            return redirect()->back();
        }
    }

    public function show(Course $course)
    {
        $this->authorize('view', [Course::class, $course]);

        return view('resource.course.show', [
            'title' => __('Show Course'),
            'course' => $course,
            'topics' => Topic::all(),
            'educationLevels' => EducationLevel::all(),
            'lecturers' => User::whereRelation('roles', 'name', '=', 'lecturer')->get(),
        ]);
    }

    public function edit(Course $course)
    {
        $this->authorize('update', [Course::class, $course]);

        return view('resource.course.edit', [
            'title' => __('Edit Course'),
            'course' => $course,
            'topics' => Topic::all(),
            'educationLevels' => EducationLevel::all(),
            'lecturers' => User::whereRelation('roles', 'name', '=', 'lecturer')->get(),
            'courseCalendarEvents' => (new CalendarEventService)->getCalendarEvents('app'),
        ]);
    }

    public function update(UpdateRequest $request, Course $course)
    {
        $this->authorize('update', [Course::class, $course]);

        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            $course->update([
                'title' => $validatedData['title'],
                'slug' => Str::slug($validatedData['title']),
                'description' => $validatedData['description'],
                'date' => $validatedData['date'],
                'start_time' => $validatedData['start_time'],
                'quota' => $validatedData['quota'],
                'zoom_link' => $validatedData['zoom_link'],
                'zoom_id' => $validatedData['zoom_id'],
                'zoom_password' => $validatedData['zoom_password'],
                'youtube_link' => $validatedData['youtube_link'] ?? null,
                'topic_id' => $validatedData['topic_id'],
                'lecturer_id' => $validatedData['lecturer_id'],
            ]);

            foreach ($validatedData['education_level_ids'] as $id) {
                CourseEducationLevel::updateOrCreate([
                    'course_id' => $course->id,
                    'education_level_id' => $id,
                ]);
            }

            DB::commit();

            session()->flash('success', __('Course successfully updated'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            DB::rollBack();

            session()->flash('error', __('Failed to update course'));

            return redirect()->back();
        }
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', [Course::class, $course]);

        try {
            $course->forceDelete();

            session()->flash('success', __('Course successfully deleted'));

            return redirect()->route('course.index');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to delete course'));

            return redirect()->back();
        }
    }

    public function cancel(Course $course)
    {
        try {
            $course->status = Course::STATUS_CANCELLED;
            $course->save();

            foreach ($course->courseParticipants as $courseParticipant) {
                CourseCancellationMailJob::dispatch($courseParticipant->participant, $course);
            }

            session()->flash('success', __('Course successfully canceled'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to cancel course'));

            return redirect()->back();
        }
    }

    public function continue(Course $course)
    {
        try {
            $course->status = Course::STATUS_AVAILABLE;
            $course->save();

            session()->flash('success', __('Course successfully continued'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to continue course'));

            return redirect()->back();
        }
    }

    public function complete(CompleteRequest $request, Course $course)
    {
        try {
            $validatedData = $request->validated();

            $course->update([
                'status' => Course::STATUS_DONE,
                'youtube_link' => $validatedData['youtube_link'],
            ]);

            session()->flash('success', __('Course successfully mark as completed'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to mark the course as completed'));

            return redirect()->back();
        }
    }
}
