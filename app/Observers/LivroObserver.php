<?php
namespace App\Observers;

use App\Models\Livro;
use App\Mail\LivroCreatedMail;
use App\Settings\EmailSettings;
use Illuminate\Support\Facades\Mail;

class LivroObserver
{
    public function created(Livro $livro): void
    {
        $settings = app(EmailSettings::class);

        Mail::to('destinatario@email.com')->queue(new LivroCreatedMail(
            $livro,
            $settings->assunto,
            $settings->corpo_saudacao,
            $settings->corpo_mensagem,
            $settings->corpo_despedida,
        ));
    }
}
