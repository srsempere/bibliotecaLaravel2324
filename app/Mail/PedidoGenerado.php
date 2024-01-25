<?php

namespace App\Mail;

use App\Models\Factura;
use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PedidoGenerado extends Mailable
{
    use Queueable, SerializesModels;



    /**
     * Create a new message instance.
     */
    public function __construct(public Factura $factura, public ?PDF $pdfData=null)
    {
      //
    }

    public function build()
    {
        return $this->view('facturas.pdf')
                    ->subject('Su Factura')
                    ->attachData($this->pdfData, 'factura.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }


    /**
     * Get the message envelope.
     * El asunto.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pedido Generado',
        );
    }

    /**
     * Get the message content definition.
     * Plantilla blade que contendrá el contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.pedidogenerado',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData($this->pdfData, 'factura.pdf', 'application/pdf'),
        ];
    }
}
