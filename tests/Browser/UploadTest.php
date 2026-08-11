<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UploadTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_upload(): void
    {
    
        $this->browse(function (Browser $browser) {
            $image1 = UploadedFile::fake()->image('imagem1.jpg', 640, 480);
            $image2 = UploadedFile::fake()->image('imagem2.jpg', 640, 480);

            # create
            $browser->visit('/livros/create')
                ->attach('imagem', $image1->getPathname());

            # update 
            $browser->clickLink('Editar')
            ->attach('imagem', $image2->getPathname());

            # delete imagem
            $browser->press('Deletar Imagem')
            ->acceptDialog();
        });
    }
}
