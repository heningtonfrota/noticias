<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;


class NoticiaController extends Controller
{
    public function index()
    {
        return Noticia::all();
    }

    public function store(Request $request)
    {
        return Noticia::create($request->all());
    }

    public function update(Request $request, Noticia $noticia)
    {
        $noticia->update($request->all());
        return $noticia;
    }

    public function destroy(Noticia $noticia)
    {
        return $noticia->delete();
    }

    public function show(Noticia $noticia)
    {
        return $noticia;
    }
}
