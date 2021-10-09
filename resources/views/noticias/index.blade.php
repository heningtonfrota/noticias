@extends('adminlte::page')

@section('title', 'Notícias')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Notícias
    <small class="text-muted">- Index</small>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Tabela de Notícias
        </h3>
    </div>

    <div class="card-body">
        @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
        @endif

        <a href="/noticias/create" class="btn btn-primary mb-5">Nova Notícia</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    <th>Status</th>
                    <th>Data Publicação</th>
                    <th>Imagem</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($noticias as $noticia)
                    <tr>
                        <td>
                            <a href="/noticias/{{ $noticia->id }}/edit" class="btn btn-primary btn-sm">Editar</a>
                            <form action="/noticias/{{ $noticia->id }}" class="d-inline-block" method="POST" onSubmit="confirmarExclusao(event)">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                        <td>{{ $noticia->titulo }}</td>
                        <td>{{ $noticia->subtitulo }}</td>
                        <td>{{ $noticia->status_formatado }}</td>
                        <td>{{ $noticia->data_publicacao->format("d/m/Y") }}</td>
                        <td><img src="{{ $noticia->imagem}}" height="40px"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $noticias->links() }}
    </div>
</div>
<script>
    function confirmarExclusao(event) {
        event.preventDefault();
        swal({
            title: "Você realmente deseja excluir esse registro?",
            text: "",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancelar",
                catch: {
                    text: "Excluir",
                    value: true
                }
            },
        })
        .then((willDelete) => {
            if (willDelete) {
                event.target.submit();
            } else {
                return false;
            }
        });
    }
</script>
@stop
