<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $dados = $request->all();
        $c = Comentario::create($dados);

        return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
    }
}
