<?php

namespace App\Console\Commands;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateCourseStatus extends Command
{
    protected $signature = 'course:update-status';
    protected $description = 'Update course status to done when date and time have passed';

    public function handle()
    {
        // Cek apakah kolom 'date' berisi datetime atau hanya date
        // Jika date adalah datetime, gunakan ini:
        $courses = Course::where('status', Course::STATUS_AVAILABLE)
            ->where('date', '<', Carbon::now())
            ->get();

        $count = $courses->count();

        foreach ($courses as $course) {
            $course->update(['status' => Course::STATUS_DONE]);
        }

        $this->info("Updated {$count} course(s) to done status.");
        
        return 0;
    }
}