<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EmailSettings extends Settings
{
    public string $assunto = 'Novo livro cadastrado: {titulo}';

    public string $corpo_saudacao = 'Olá,';

    public string $corpo_mensagem = 'Um novo livro foi cadastrado no sistema.';

    public string $corpo_despedida = 'Atenciosamente,';

    public static function group(): string
    {
        return 'default';
    }

}