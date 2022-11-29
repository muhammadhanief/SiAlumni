<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailKepalaBaak extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->jenis = ucwords(($data['jenis']=='transkrip') ? 'transkrip nilai' : 'ijazah');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Konfirmasi Permohonan Legalisir '.$this->jenis,
        );
    }

    /**
    * Get the message content definition.
    *
    * @return \Illuminate\Mail\Mailables\Content
    */
    public function content()
    {
        return new Content(
            markdown: 'emails.admin.kepalabaak',
            with: [
                    'data' => $this->data,
                    'jenis' => $this->jenis,

],
);
}

/**
* Get the attachments for the message.
*
* @return array
*/
public function attachments()
{
return [];
}
}