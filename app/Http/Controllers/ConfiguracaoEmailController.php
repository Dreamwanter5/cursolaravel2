<?php

namespace App\Http\Controllers;

use App\Settings\EmailSettings;
use Illuminate\Http\Request;

class ConfiguracaoEmailController extends Controller
{
    public function edit(EmailSettings $settings)
    {
        return view('configuracoes.email', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request, EmailSettings $settings)
    {
        $validated = $request->validate([
            'assunto' => ['required', 'string', 'max:255'],
            'corpo_saudacao' => ['required', 'string'],
            'corpo_mensagem' => ['required', 'string'],
            'corpo_despedida' => ['required', 'string'],
        ]);

        $settings->assunto = $validated['assunto'];
        $settings->corpo_saudacao = $validated['corpo_saudacao'];
        $settings->corpo_mensagem = $validated['corpo_mensagem'];
        $settings->corpo_despedida = $validated['corpo_despedida'];
        $settings->save();

        return redirect('/configuracoes/email')->with('success', 'Configurações de email atualizadas.');
    }
}