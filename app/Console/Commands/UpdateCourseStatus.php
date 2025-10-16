<?php

namespace App\Console\Commands;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateCourseStatus extends Command
{
    protected $signature = 'course:update-status';
    protected $description = 'Update course status to done when date has passed (H+1)';

    public function handle()
    {
        // Ambil course yang sudah melewati hari ini (H+1)
        $courses = Course::where('status', Course::STATUS_AVAILABLE)
            ->whereDate('date', '<', Carbon::today())
            ->get();

        $count = $courses->count();

        foreach ($courses as $course) {
            $course->update(['status' => Course::STATUS_DONE]);
        }

        $this->info("Updated {$count} course(s) to done status.");
        
        return 0;
    }
}