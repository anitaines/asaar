<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class JoinMail extends Mailable
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
      return $this->subject('Solicitud de nuevo socio desde el sitio web')
                  ->from('notificaciones.asaar@gmail.com', 'Notificaciones AsAAr')
                  ->to('gdi.anaines@gmail.com')
                  // cambiar por ->to('info@asperger.org.ar')
                  ->replyTo($this->email->email)
                  ->view('email.joinmail');
    }
}
