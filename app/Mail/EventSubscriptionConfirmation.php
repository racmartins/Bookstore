<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventSubscriptionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $subscriberEmail;


    /**
     * Create a new message instance.
     */
    public function __construct(Event $event, $subscriberEmail)
    {
        $this->event = $event;
        $this->subscriberEmail = $subscriberEmail;
    }

    public function build()
    {
        return $this->from('admin@dominio.pt')
                    ->subject('Confirmação de Inscrição no Evento')
                    ->view('emails.event_subscription_confirmation');
    }
}
