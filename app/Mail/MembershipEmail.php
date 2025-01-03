<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class MembershipEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Membership',
            from: new Address('aswan@iesta.org', 'Muhammad Aswan')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.membership-email',
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

    /**
     * Get the attachments for the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('pages.frontsite.email-membership.index')
            ->subject('New Membership Application')
            ->with($this->data);

        // Memeriksa apakah lampiran ada
        if ($this->data['cv'] && Storage::disk('public')->exists($this->data['cv'])) {
            // Menggunakan attachFromStorageDisk untuk melampirkan file dari storage publik
            $email->attachFromStorageDisk('public', $this->data['cv'], basename($this->data['cv']));
        }

        return $email;
    }
}
