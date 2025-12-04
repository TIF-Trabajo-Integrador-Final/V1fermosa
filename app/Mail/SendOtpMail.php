<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    /**
     * Recibe el código OTP generado
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Construye el correo
     */
    public function build()
    {
        return $this->subject('Código de Recuperación - ISF')
                    ->view('emails.send-otp')
                    ->with([
                        'code' => $this->code
                    ]);
    }
}
