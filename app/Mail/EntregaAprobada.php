<?php

namespace App\Mail;

use App\Models\EntregasEquipo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EntregaAprobada extends Mailable
{
    use Queueable, SerializesModels;

    public $entrega; // Variable pública para usar en la vista

    /**
     * Recibe la entrega desde el Controlador
     */
    public function __construct(EntregasEquipo $entrega)
    {
        $this->entrega = $entrega;
    }

    /**
     * Construye el mensaje (Asunto y Vista)
     */
    public function build()
    {
        return $this->subject('Notificación: Entrega de Equipo Aprobada')
                    ->view('emails.entrega_aprobada'); 
    }
}