<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviaRelatorio extends Mailable
{
    use Queueable, SerializesModels;

    public $relatorio;
    public $anunciante;

    public function __construct($relatorio, $anunciante)
    {
        $this->relatorio = $relatorio;
        $this->anunciante = $anunciante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.relatorio')->from('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->replyTo('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->subject('Relatório de Integração! Rede Imóveis MT');
    }

}
