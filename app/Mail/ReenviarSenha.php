<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReenviarSenha extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $codigo;

    public function __construct($user, $codigo)
    {
        $this->user = $user;
        $this->codigo = $codigo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.senha')->from('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->subject('Você solicitou uma nova senha! Rede Imóveis MT');
    }

}
