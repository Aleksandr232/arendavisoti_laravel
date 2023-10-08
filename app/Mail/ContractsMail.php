<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;


class ContractsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;


    public function __construct($data)
    {
        $this->data = $data;

    }

    public function build()
    {
        return $this->subject('Новое сообщение от ООО "Аренда высоты"')
                    /* ->view('site.mail.sendcontracts') */
                    ->markdown('site.mail.sendcontracts')
                    ->attach('mail/' . $this->data['path'])
                    ->with('data', $this->data);


    }

    public function attachments()
    {
        return [$this->data['path']];
    }

    public function content(): Content
    {
        return new Content(
            view: 'site.mail.sendcontracts',
        );
    }
}
