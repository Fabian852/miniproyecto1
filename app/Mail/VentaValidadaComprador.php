<?php

namespace App\Mail;

use App\Models\Venta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VentaValidadaComprador extends Mailable
{
    use Queueable, SerializesModels;

    public $venta;
    public $productos;
    public $vendedor;

    /**
     * Create a new message instance.
     */
    public function __construct(Venta $venta)
    {
        $this->venta = $venta;
        $this->productos = $venta->productos;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Tu compra ha sido validada')
                    ->view('emails.venta.comprador')
                    ->with([
                        'venta' => $this->venta,
                        'productos' => $this->productos,
                    ]);
    }
}
