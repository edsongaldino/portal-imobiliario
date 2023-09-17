<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviaLead extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    public function __construct($lead)
    {
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.lead')->from('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->replyTo('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->subject('Novo Lead Recebido! Rede Imóveis MT');
    }

}
