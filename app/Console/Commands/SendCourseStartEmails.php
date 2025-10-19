<?php

namespace App\Console\Commands;

use App\Jobs\CourseStartMailJob;
use App\Models\Course;
use Illuminate\Console\Command;

class SendCourseStartEmails extends Command
{
    protected $signature = 'course:send-start-emails';
    protected $description = 'Send emails to participants when course is starting (15 minutes before)';

    public function handle()
    {
        // Ambil course yang:
        // 1. Belum pernah dikirim email (zoom_opened_at masih NULL)
        // 2. Punya peserta
        $courses = Course::whereNull('zoom_opened_at')
            ->whereHas('courseParticipants')
            ->get()
            ->filter(function ($course) {
                // Filter hanya yang sedang starting dan belum dibatalkan
                return $course->isStarting() && !$course->isCancelled();
            });

        if ($courses->isEmpty()) {
            $this->info('No courses ready to send emails.');
            return;
        }

        $emailCount = 0;

        foreach ($courses as $course) {
            $this->info("Processing course: {$course->title}");

            // Set zoom_opened_at agar tidak kirim email berulang
            $course->update(['zoom_opened_at' => now()]);

            // Kirim email ke semua peserta
            foreach ($course->courseParticipants as $participant) {
                CourseStartMailJob::dispatch($participant->participant, $course);
                $emailCount++;
            }

            $this->info("✓ Emails dispatched for: {$course->title} ({$course->courseParticipants->count()} participants)");
        }

        $this->info("─────────────────────────────");
        $this->info("Total courses processed: {$courses->count()}");
        $this->info("Total emails dispatched: {$emailCount}");
    }
}