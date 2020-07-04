<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->email = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contacto desde el sitio web')
                    ->from('notificaciones.asaar@gmail.com', 'Notificaciones AsAAr')
                    ->to('gdi.anaines@gmail.com')
                    // cambiar por ->to('info@asperger.org.ar')
                    ->replyTo($this->email->email)
                    ->view('email.contactmail');
    }
}

// ($this->email->email, $this->email->name)

// plan b: habilitar forward en gmail?
// Se enviará un mensaje de verificación a esa dirección. Haz clic en el enlace de verificación del mensaje.
