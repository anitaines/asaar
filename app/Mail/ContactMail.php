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
                    ->from('info@asperger.com.ar')
                    ->to('info@asperger.com.ar')
                    ->replyTo($this->email->email)
                    ->view('email.contactmail');
    }
}

// from($this->email->email, $this->email->name)

// DINAMICA FUTURA:
// OJO REPLY-TO MARCA COMO SPAM
// AGREGAR LEYENDA "NO RESPONDER ESTE MAIL"??
// Registrar un notificaciones-asaar@gmail.com
// Activar app password
// return $this->subject('Contacto desde el sitio web')
//             ->from('notificaciones-asaar@gmail.com')
//             ->to('info@asperger.com.ar')
//             cc('notificaciones-asaar@gmail.com') para que queden guardados los mails
//             ->replyTo($this->email->email)
//             ->view('email.contactmail');
