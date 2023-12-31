<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $name = "";
    // public $email = "";
    // public $noidung = "";

    public $data;
    // public $reply;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        // $this->name = $name;
        // $this->email = $email;
        // $this->noidung = $content;
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('longthaithien98@gmail.com', 'Louis'),
            replyTo: [
                new Address('longthaithien98@gmail.com', 'Louis')
            ],
            subject: 'Mail liên hệ',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'contacts.interfaceContact',
            with: [
                'data' => $this->data,
                // 'reply' => $this->reply
            ]
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
