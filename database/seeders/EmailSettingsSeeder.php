<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $table = config('settings.repositories.database.table') ?? 'settings';

        $rows = [
            'assunto' => 'Novo livro cadastrado: {titulo}',
            'corpo_saudacao' => 'Olá,',
            'corpo_mensagem' => 'Um novo livro foi cadastrado no sistema.',
            'corpo_despedida' => 'Atenciosamente,',
        ];

        foreach ($rows as $name => $value) {
            DB::table($table)->updateOrInsert(
                [
                    'group' => 'default',
                    'name' => $name,
                ],
                [
                    'locked' => false,
                    'payload' => json_encode($value),
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}