<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $order_id;
    public $order_code;

    /**
     * Create a new message instance.
     */
    public function __construct($order_id, $order_code)
    {
        $this->order_id = $order_id;
        $this->order_code = $order_code;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.orders.confirmed',
            with: [
                'url' => route('user.order', ['id' => $this->order_id, 'code' => $this->order_code])
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
