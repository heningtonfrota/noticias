<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'nome' => 'Esporte'
            ],
            [
                'nome' => 'Saude'
            ],
            [
                'nome' => 'Lazer'
            ]
        ];

        foreach ($categorias as $key => $categoria) {
            Categoria::firstOrCreate($categoria);
        }
    }
}
