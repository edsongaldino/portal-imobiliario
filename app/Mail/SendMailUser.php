<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;

    public $anunciante;

    public function __construct($anunciante)
    {
        $this->anunciante = $anunciante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmacao')->from('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->replyTo('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->subject('Confirmação de Cadastro - Rede Imóveis MT');
    }
}
