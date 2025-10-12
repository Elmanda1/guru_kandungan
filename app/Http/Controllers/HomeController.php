<?php

namespace App\Http\Controllers;

use App\Services\CalendarEventService;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'title' => __('Home'),
            'courseCalendarEvents' => (new CalendarEventService)->getCalendarEvents(),
        ]);
    }
}
