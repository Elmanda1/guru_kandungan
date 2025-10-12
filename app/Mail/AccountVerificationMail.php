<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class AccountVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verifikasi Akun',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return (new Content)
            ->markdown('mail.account-verification')
            ->with([
                'user' => $this->user,
                'verificationUrl' => $this->getVerificationUrl($this->user),
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

    protected function getVerificationUrl($user)
    {
        return URL::temporarySignedRoute('verification.verify', now()->addMinutes(60), [
            'id' => auth()->user()->getKey(),
            'hash' => sha1(auth()->user()->getEmailForVerification()),
        ]);
    }
}
