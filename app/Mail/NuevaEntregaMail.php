<?php

namespace App\Mail;

use App\Models\Entregas;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevaEntregaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $entrega;

    public function __construct(Entregas $entrega)
    {
        $this->entrega = $entrega;
    }

    public function build()
    {
        return $this->subject('Nueva Entrega Registrada')
                    ->view('emails.nueva_entrega');
    }
}
