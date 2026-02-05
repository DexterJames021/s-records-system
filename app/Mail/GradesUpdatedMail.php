<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GradesUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;

    public $subjects;

    public $average;

    /**
     * Create a new message instance.
     */
    public function __construct($student)
    {
        $this->student = $student;
        $this->subjects = $student->subjects;
        $this->average = $student->subjects->avg('pivot.grade');

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Grades Updated Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.grades_updated',
        );
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
