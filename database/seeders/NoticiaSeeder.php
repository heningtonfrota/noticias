<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\UploadServices;
use App\Models\Noticia;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $noticias = [
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A'
            ],
            [
                'titulo' => 'Titulo',
                'conteudo' => 'Conteudo texto da noticia',
                'imagem' => '/storage/portal_do_holanda.jpg',
                'status' => 'A',
            ],
        ];

        $novaNoticia = [
            [
                "titulo" => "TESTE#1",
                "conteudo" => "asdfasdwqerw",
                "imagem" => "/storage/Captura de tela de 2021-07-03 08-30-21.png",
                "status" => "A",
                "user_id" => null,
                "data_publicacao" => "14/07/2021"
            ],
            [
                "titulo" => "TESTE#2",
                "conteudo" => "asdfasdwqerw",
                "imagem" => "/storage/Captura de tela de 2021-07-03 08-30-21.png",
                "status" => "A",
                "user_id" => null,
                "data_publicacao" => "14/07/2021"
            ],
            [
                "titulo" => "TESTE#3",
                "conteudo" => "asdfasdwqerw",
                "imagem" => "/storage/Captura de tela de 2021-07-03 08-30-21.png",
                "status" => "A",
                "user_id" => null,
                "data_publicacao" => "14/07/2021"
            ]
        ];

        foreach ($novaNoticia as $noticia) {
            Noticia::create($noticia);
        }
    }
}
