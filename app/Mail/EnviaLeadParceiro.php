<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviaLeadParceiro extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;
    public $parceiro;

    public function __construct($lead, $parceiro)
    {
        $this->lead = $lead;
        $this->parceiro = $parceiro;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.lead_parceiro')->from('contato@redeimoveismt.com.br', 'Rede Imóveis MT');
    }

}
