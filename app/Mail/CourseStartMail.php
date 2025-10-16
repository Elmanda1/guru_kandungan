<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CourseStartMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $course;
    public $url;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
        $this->url = route('course-schedule.app-detail', $course->slug);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Link Zoom untuk ' . $this->course->name . ' Sudah Dibuka!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return (new Content)
            ->markdown('mail.zoom-opened')
            ->with([
                'user' => $this->user,
                'course' => $this->course,
                'url' => $this->url,
            ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
