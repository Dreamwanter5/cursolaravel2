<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Livro;

class LivroCrudTest extends DuskTestCase
{
    use DatabaseMigrations;
    public function test_crud_livros(): void
    {
        $this->browse(function (Browser $browser) {
            // Login
            $browser->visit('/')
                ->clickLink('Entrar')
                ->waitFor('#loginUsuario')
                ->typeSlowly('#loginUsuario', '111111')
                ->press('Login');
                
            // Create
            $browser->visit('/livros/create')
                ->typeSlowly('titulo', 'Rerum quasi vitae dolore.')
                ->typeSlowly('autor', 'Wiley Leffler V')
                ->typeSlowly('ano', '2018')
                ->press('Enviar')
                ->assertPathIs('/livros')
                ->assertSee('Rerum quasi vitae dolore.');

            // Read Index (search)
            $browser->visit('/livros')
                ->type('search', 'Rerum quasi vitae dolore.')
                ->press('Pesquisar')
                ->assertSee('Rerum quasi vitae dolore.')
                ->type('search', 'TextoInexistenteXYZ')
                ->press('Pesquisar')
                ->assertDontSee('Rerum quasi vitae dolore.');

            // Read Show
            $browser->visit('/livros')
                ->clickLink('Rerum quasi vitae dolore.')
                ->assertSee('Wiley Leffler V')
                ->assertSee('2018');

            // Update
            $browser->clickLink('Editar')
                ->typeSlowly('titulo', 'Rerum quasi vitae dolore. - Editado')
                ->press('Enviar')
                ->assertSee('Rerum quasi vitae dolore. - Editado');

            // Delete
            $browser->press('Apagar')
                ->acceptDialog()
                ->assertPathIs('/livros')
                ->assertDontSee('Rerum quasi vitae dolore. - Editado');

            // Export to Excel
            $browser->visit('/livros/excel?search=Editado');
            $response = $this->get('/livros/excel?search=Editado');
            $response->assertStatus(200);
            $response->assertHeader('content-disposition', 'attachment; filename=livros.xlsx');

            // Export to PDF
            $browser->visit('/livros/pdf?search=Editado');
            $response = $this->get('/livros/pdf?search=Editado');
            $response->assertStatus(200);
            $response->assertHeader('content-disposition', 'attachment; filename=livros.pdf');


        });
    }
}
