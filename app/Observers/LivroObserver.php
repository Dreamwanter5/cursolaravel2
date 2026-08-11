<?php
namespace App\Observers;

use App\Models\Livro;
use App\Mail\LivroCreatedMail;
use Illuminate\Support\Facades\Mail;

class LivroObserver
{
    public function created(Livro $livro): void
    {
        Mail::to('destinatario@email.com')->queue(new LivroCreatedMail($livro));
    }
}
