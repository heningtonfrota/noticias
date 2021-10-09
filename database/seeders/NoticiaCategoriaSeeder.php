<?php

namespace Database\Seeders;

use App\Models\NoticiaCategoria;
use Illuminate\Database\Seeder;

class NoticiaCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [
                'noticia_id' => 1,
                'categoria_id' => 1
            ],
            [
                'noticia_id' => 1,
                'categoria_id' => 2
            ]
        ];

        foreach ($dados as $key => $dado) {
            NoticiaCategoria::firstOrCreate($dado);
        }
    }
}
