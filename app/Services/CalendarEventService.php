<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Support\Carbon;

class CalendarEventService
{
    public function getCalendarEvents($layout = 'guest')
    {
        $courses = Course::query()
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        $courseCalendarEvents = [];
        foreach ($courses as $course) {
            $courseCalendarEvents[] = [
                'id' => $course->id,
                'name' => $course->title,
                'description' => '
                    <div>
                        <div class="d-flex flex-column justify-content-end mb-2">
                            <div class="small">
                                <svg height="20" width="20" class="pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9l0 57.1c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-57.1L48 93.3l0 65.1 15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9l-32 0c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4l0-71.8C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"></path>
                                </svg> '
                    .$course->lecturer?->name.
                    '</div>
                            <div class="small mt-2">
                                <svg height="20" width="20" class="pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path d="M96 32l0 32L48 64C21.5 64 0 85.5 0 112l0 48 448 0 0-48c0-26.5-21.5-48-48-48l-48 0 0-32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 32L160 64l0-32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192L0 192 0 464c0 26.5 21.5 48 48 48l352 0c26.5 0 48-21.5 48-48l0-272z"></path>
                                </svg> '
                    .Carbon::parse($course->date)->translatedFormat('l, d F Y').
                    '</div>
                            <div class="small mt-2">
                                <svg height="20" width="20" class="pb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"></path>
                                </svg> '
                    .substr($course->start_time, 0, 5).' - Selesai'.
                    '</div>
                        </div>
                        <b>Klik untuk melihat detail</b>
                    </div>
                ',
                'date' => $course->date,
                'type' => 'event',
                'detail_link' => route('course-schedule.'.$layout.'-detail', $course->slug),
            ];
        }

        return json_encode($courseCalendarEvents);
    }
}
