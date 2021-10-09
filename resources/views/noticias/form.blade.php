@extends('adminlte::page')

@section('title', 'Notícias')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Notícias
    <small class="text-muted">- Formulário</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Formulário de Notícias
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <p><strong>Erro ao realizar esta operação</strong></p>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        @if (isset($noticia))
            <form action="/noticias/{{ $noticia->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
        @else
            <form action="/noticias" method="POST" enctype="multipart/form-data">
        @endif

            @csrf

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" placeholder="Digite o título da notícia" class="form-control" value="{{ isset($noticia) ? $noticia->titulo : '' }}">
            </div>

            <div class="form-group">
                <label for="subtitulo">Subtítulo</label>
                <input type="text" name="subtitulo" placeholder="Digite o título da notícia" class="form-control" value="{{ isset($noticia) ? $noticia->subtitulo : '' }}">
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea name="conteudo" placeholder="Digite o conteúdo da notícia" class="form-control" rows="5">{{ isset($noticia) ? $noticia->conteudo : '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem Destaque</label>
                <input type="file" name="imagem"/>
                @if (isset($noticia) && $noticia->imagem)
                    <img src="{{ $noticia->imagem }}" alt="" height="100px" class="d-block">
                @endif
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="A" {{ isset($noticia) && $noticia->status == "A" ? "selected='selected'" : "" }}>Ativo</option>
                    <option value="I" {{ isset($noticia) && $noticia->status == "I" ? "selected='selected'" : "" }}>Inativo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="data_publicacao">Data da Publicação</label>
                <input type="text" name="data_publicacao" class="form-control" data-provide="datepicker" data-date-language="pt-BR" value="{{ isset($noticia) ? $noticia->data_publicacao->format("d/m/Y") : '' }}">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>

            <hr>
            <div class="row">
                <div class="col">
                    <h2>Comentarios</h2>

                    @if (isset($noticias) && $noticia->comentarios->all() != [])
                        @foreach ($noticia->comentarios as $comentario)
                            <blockquote class="blockquote mb-0">
                                <p>{{ $comentario->conteudo }}</p>
                                <footer class="blockquote-footer">
                                    Criado em:
                                    <cite title="Source Title">
                                        {{ $comentario->created_at->format('d/m/Y H:i')}}
                                    </cite>
                                </footer>
                                <footer class="blockquote-footer">
                                    Publicado em:
                                    <cite title="Source Title">
                                        {{ $comentario->noticia->data_publicacao->format('d/m/Y') }}
                                    </cite>
                                </footer>
                            </blockquote>
                        @endforeach
                    @else
                        <p class="alert alert-danger p-2">A noticia não possui comentarios</p>
                    @endif

                    <h3 class="mt-3">Novo Comentario</h3>
                    <form action="{{ route('comentarios.store') }}" class="form-group" method="POST">
                        @csrf
                        <input type="text" name="noticia_id" id="noticia_id" class="d-none" value="{{ $noticia->id ?? ''}}">
                        <textarea name="conteudo1" id="conteudo" cols="30" rows="3" class="form-control"></textarea>
                        <button type="submit" class="btn btn-success mt-2">Enviar</button>
                    </form>
                </div>
                @if (isset($noticias))
                    <div class="col">
                        <h2>Categorias</h2>
                        @foreach ($noticia->categorias as $categoria)
                            <blockquote class="blockquote mb-0">
                                <p>{{ $categoria->nome }}</p>
                            </blockquote>
                        @endforeach
                    </div>
                @endif
            </div>

        </form>
    </div>
</div>
@stop
