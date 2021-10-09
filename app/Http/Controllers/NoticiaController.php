<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoticiaRequest;
use App\Models\Comentario;
use App\Models\Noticia;
use App\Models\NoticiaCategoria;
use Carbon\Carbon;
use App\Services\UploadService;

class NoticiaController extends Controller
{

    public function index()
    {
        $noticias = Noticia::where('status', Noticia::STATUS_ATIVO)->paginate(5);

        return view('noticias.index', [
            'noticias' => $noticias
        ]);
    }

    public function create()
    {
        return view('noticias.form');
    }

    public function store(NoticiaRequest $request)
    {
        $dados = $request->all();
        //$dados['data_publicacao'] = Carbon::createFromFormat("d/m/Y", $dados['data_publicacao'])->format("Y-m-d"); // Usando Mutators
        $dados['imagem'] = UploadService::upload($dados['imagem']);
        // $dados['imagem']->storeAs('public', $dados['imagem']->getClientOriginalName());
        // $dados['imagem'] = '/storage/' . $dados['imagem']->getClientOriginalName();

        Noticia::create($dados);

        return redirect()->back()->with('mensagem', 'Registro criado com sucesso!');
    }

    public function edit(Noticia $noticia)
    {
        // $noticia = Noticia::findOrFail($noticia);
        return view('noticias.form', [
            'noticia' => $noticia
        ]);
    }

    public function update(NoticiaRequest $request, Noticia $noticia)
    {
        // $noticia = Noticia::findOrFail($noticia);
        $dados = $request->all();
        //$dados['data_publicacao'] = Carbon::createFromFormat("d/m/Y", $dados['data_publicacao'])->format("Y-m-d"); // Usando Mutators
        if ($request->imagem) {
            $dados['imagem'] = UploadService::upload($request->imagem);
            // $request->imagem->storeAs('public', $request->imagem->getClientOriginalName());
            // $dados['imagem'] = '/storage/' . $request->imagem->getClientOriginalName();
        }
        $noticia->update($dados);

        return redirect()->back()->with('mensagem', 'Registro atualizado com sucesso!');
    }

    public function destroy(Noticia $noticia)
    {
        // $noticia = Noticia::findOrFail($noticia);
        // Comentario::where("noticia_id", $noticia->id)->delete();
        // NoticiaCategoria::where("noticia_id", $noticia->id)->delete();
        $noticia->comentarios->delete();
        $noticia->categorias->delete();
        $noticia->delete();


        return redirect('/noticias')->with('mensagem', 'Registro excluído com sucesso!');
    }
}
