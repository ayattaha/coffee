<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    
    /**
     * Create a new message instance.
     *
     * @param array $data
     *
     */

   
   
    /**
     * Create a new message instance.
     */
    public function __construct( array $data)
    {
        $this->data = $data;
    }
/**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'], $this->data['name'])
        ->markdown('emails.mailToAdmin')
        ->with(['data' => $this->data,
                 ]);

    } 

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     // return new Envelope(
    //     //     subject: 'Contact Mail',
    //     // );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     // return new Content(
    //     //     view: 'view.name',
    //     // );
    // }

    /**
     * Get the attachments for the message.
     *
      *
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
