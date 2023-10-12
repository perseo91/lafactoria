<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class EnviarCorreo extends Mailable
{
    use Queueable, SerializesModels;
    public $mensaje;
    public $adjunto;
    public $nombre;
    public $correo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje,$adjunto,$nombre, $correo)
    {
        //
        $this->mensaje=$mensaje;
        $this->adjunto=$adjunto;
        $this->nombre=$nombre;
        $this->correo=$correo;
       

     
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('vanessa.lombardi.git@gmail.com', request()->nombre),
            subject: 'Enviar Correo',
            
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
            view: 'mails.enviar-correo',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [ Attachment::fromData(fn () => $this->adjunto->get(),$this->adjunto->getClientOriginalName())->withMime($this->adjunto->getMimeType())];
    }
}
