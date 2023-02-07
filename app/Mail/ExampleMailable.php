<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExampleMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject="Test Laravel 1";
    public $texto="";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($texto)
    {
        //
        $this->texto=$texto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() //Clase para hacer el envio del correo
    {
        return $this->view('emails.ejemplo');
    }
}
