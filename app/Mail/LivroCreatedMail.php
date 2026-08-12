<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Livro;

class LivroCreatedMail extends Mailable implements ShouldQueue 
{
    use Queueable, SerializesModels;

    public function __construct(
        private Livro $livro,
        private string $assunto,
        private string $corpo_saudacao,
        private string $corpo_mensagem,
        private string $corpo_despedida,
    )
    {
    }

    private function renderText(string $text): string
    {
        return str_replace(
            ['{titulo}', '{autor}', '{ano}'],
            [$this->livro->titulo, $this->livro->autor, $this->livro->ano],
            $text
        );
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->renderText($this->assunto),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.create',
            with: [
                'livro' => $this->livro,
                'corpo_saudacao' => $this->renderText($this->corpo_saudacao),
                'corpo_mensagem' => $this->renderText($this->corpo_mensagem),
                'corpo_despedida' => $this->renderText($this->corpo_despedida),
            ],
        );
    }
}
