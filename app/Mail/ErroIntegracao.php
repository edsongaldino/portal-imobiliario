<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ErroIntegracao extends Mailable
{
    use Queueable, SerializesModels;

    public $anunciante;
    public $mensagemErro;
    public $destinatarioTipo; // 'cliente' ou 'admin'

    /**
     * Create a new message instance.
     *
     * @param mixed $anunciante
     * @param string $mensagemErro
     * @param string $destinatarioTipo
     */
    public function __construct($anunciante, $mensagemErro, $destinatarioTipo)
    {
        $this->anunciante = $anunciante;
        $this->mensagemErro = $mensagemErro;
        $this->destinatarioTipo = $destinatarioTipo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->destinatarioTipo === 'admin' 
            ? "[ADMIN] Falha na Integração de Anúncios - " . $this->anunciante->nome
            : "Atenção: Falha na Integração de Anúncios - Rede Imóveis MT";

        return $this->view('emails.erro_integracao')
            ->from('contato@redeimoveismt.com.br', 'Rede Imóveis MT')
            ->replyTo('contato@redeimoveismt.com.br', 'Rede Imóveis MT')
            ->subject($subject);
    }
}
