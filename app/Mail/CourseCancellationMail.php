<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CourseCancellationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $course;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pembatalan Pembelajaran',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return (new Content)
            ->markdown('mail.course-cancellation')
            ->with([
                'user' => $this->user,
                'course' => $this->course,
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
