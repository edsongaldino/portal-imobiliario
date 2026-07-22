<?php

namespace App\Mail;

use App\Models\Anunciante;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RelatorioSemanal extends Mailable
{
    use Queueable, SerializesModels;

    public $anunciante;
    public $dadosRelatorio;
    public $topImoveis;

    /**
     * Create a new message instance.
     *
     * @param Anunciante $anunciante
     * @param array $dadosRelatorio
     * @param array|\Illuminate\Support\Collection $topImoveis
     */
    public function __construct(Anunciante $anunciante, array $dadosRelatorio, $topImoveis)
    {
        $this->anunciante = $anunciante;
        $this->dadosRelatorio = $dadosRelatorio;
        $this->topImoveis = $topImoveis;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $assunto = "Relatório Semanal de Desempenho - Rede Imóveis MT";
        return $this->subject($assunto)
                    ->from('contato@redeimoveismt.com.br', 'Rede Imóveis MT')
                    ->view('emails.relatorio_semanal');
    }
}
