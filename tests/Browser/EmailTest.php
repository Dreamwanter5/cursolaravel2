<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Http;

use App\Mail\LivroCriadoMail;
use Illuminate\Support\Facades\Mail;

class LivroEmailsTest extends DuskTestCase
{
    protected function setUp(): void
    {
        // Limpa as mensagens do Mailpit antes de cada teste
        parent::setUp();
        Http::delete('http://mailpit:8025/api/v1/messages');
    }

    public function test_create_livro(): void
    {
        Mail::fake();
        $this->browse(function (Browser $browser) {
            // Login
            $browser->visit('/')
                ->clickLink('Entrar')
                ->waitFor('#loginUsuario')
                ->typeSlowly('#loginUsuario', '111111')
                ->press('Login');

            // Create
            $browser->visit('/livros/create')
                ->typeSlowly('titulo', '2001: Uma odisséia no espaço')
                ->typeSlowly('autor', 'Arthur C. Clarke')
                ->typeSlowly('ano', '1968')
                ->press('Enviar')
                ->assertPathIs('/livros')
                ->assertSee('2001: Uma odisséia no espaço');
        });

        // Consulta a API do Mailpit para verificar se o e-mail foi entregue
        $response = Http::get('http://mailpit:8025/api/v1/messages');
        $messages = $response->json('messages');
        $latestMail = $messages[0];

        // Valida o assunto do e-mail enviado pela Mailable
        $this->assertStringContainsString('Novo Livro Cadastrado: ' . '2001: Uma odisséia no espaço', $latestMail['Subject']);

        // Valida se o destinatário é o correto 
        $this->assertEquals('destinatario@email.com', $latestMail['To'][0]['Address']);
    }
}
