<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comentarios = [
            [
                'conteudo' => 'Conteudo 1',
                'noticia_id' => 1

            ],
            [
                'conteudo' => 'Conteudo 2',
                'noticia_id' => 1

            ],
        ];

        foreach ($comentarios as $key => $comentario) {
            Comentario::firstOrCreate($comentario);
        }
    }
}
