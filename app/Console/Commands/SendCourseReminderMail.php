<?php

namespace App\Console\Commands;

use App\Mail\CourseReminderMail;
use App\Models\Course;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class SendCourseReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course:send-reminder-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengirim email pengingat 2 jam sebelum kelas dimulai';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $twoHoursLater = $now->copy()->addHours(2);

        $currentDate = $now->format('Y-m-d');
        $currentTime = $now->format('H:i:s');
        $timeTwoHoursLater = $twoHoursLater->format('H:i:s');

        $courses = Course::whereDate('date', $currentDate)
            ->whereTime('start_time', '>=', $currentTime)
            ->whereTime('start_time', '<=', $timeTwoHoursLater)
            ->get();

        foreach ($courses as $course) {
            $courseParticipants = $course->courseParticipants;

            foreach ($courseParticipants as $courseParticipant) {
                if ($courseParticipant->is_reminder_sent == false) {
                    Mail::to($courseParticipant->participant->email)->send(new CourseReminderMail(
                        $courseParticipant->participant,
                        $course
                    ));

                    $courseParticipant->is_reminder_sent = true;
                    $courseParticipant->save();
                }
            }
        }
    }
}
