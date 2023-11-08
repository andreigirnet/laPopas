<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Order extends Mailable
{
    use Queueable, SerializesModels;
    public $orderObj;
    public $products;// Pass the order information
    private $pdfFilePath;
    /**
     * Create a new message instance.
     */
    public function __construct($pdfFilePath,$orderObj, $products)
    {
        $this->orderObj = $orderObj;
        $this->products = $products;
        $this->pdfFilePath = $pdfFilePath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'La Popas Order',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.invoice',
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
            Attachment::fromPath($this->pdfFilePath)
                ->as('invoiceLaPopas.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
