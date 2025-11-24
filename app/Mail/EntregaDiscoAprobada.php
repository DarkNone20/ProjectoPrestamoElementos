<?php

namespace App\Mail;

use App\Models\EntregasDisco; // Importamos el modelo correcto
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EntregaDiscoAprobada extends Mailable
{
    use Queueable, SerializesModels;

    public $entrega; // Variable pública

    /**
     * Recibe la entrega de tipo DISCO
     */
    public function __construct(EntregasDisco $entrega)
    {
        $this->entrega = $entrega;
    }

    /**
     * Construye el mensaje
     */
    public function build()
    {
        return $this->subject('Notificación: Entrega de Disco Aprobada')
                    ->view('emails.entrega_disco_aprobada'); // Apunta a la nueva vista
    }
}
