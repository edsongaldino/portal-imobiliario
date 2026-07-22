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
    public $link;

    public function __construct($user, $link)
    {
        $this->user = $user;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.senha')->from('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->replyTo('contato@redeimoveismt.com.br', 'Rede Imóveis MT')->subject('Você solicitou uma nova senha! Rede Imóveis MT');
    }

}
