<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\EducationLevel;
use App\Models\Topic;
use App\Models\User;
use App\Services\CalendarEventService;

class MyHomeController extends Controller
{
    public function __invoke()
    {
        $role = auth()->user()->getRoleNames()->first();

        return view('my-home.'.$role, [
            'title' => __('Home'),
            'courseCalendarEvents' => (new CalendarEventService)->getCalendarEvents('app'),
            'courseTotal' => Course::query()->count(),
            'topicTotal' => Topic::query()->count(),
            'educationLevelTotal' => EducationLevel::query()->count(),
            'participantTotal' => User::whereRelation('roles', 'name', '=', 'participant')->count(),
            'lecturerTotal' => User::whereRelation('roles', 'name', '=', 'lecturer')->count(),
        ]);
    }
}
