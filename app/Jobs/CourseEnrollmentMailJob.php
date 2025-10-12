<?php

namespace App\Jobs;

use App\Mail\CourseEnrollmentMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CourseEnrollmentMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $course;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new CourseEnrollmentMail($this->user, $this->course));
    }
}
