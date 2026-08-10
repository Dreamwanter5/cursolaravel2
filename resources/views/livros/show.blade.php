@extends('layout')

@section('content')

Titulo: {{ $livro->titulo }} <br>
Autor: <i>{{ $livro->autor }}</i> <br>
Ano de publicação: {{ $livro->ano }} <br>
<a href="/livros">Voltar</a>
<a href="/livros/{{ $livro->id }}/edit">Editar</a> <br>

<p>
    Livro cadastrado em {{ $livro->created_at->format('d/m/Y H:i') }} <br>
    Última atualização em {{ $livro->updated_at->format('d/m/Y H:i') }} por <b>{{ $livro->user?->name }}</b> 
</p>

<div>
    @if($livro->user)
        Outros livros cadastrados ou editados por {{ $livro->user?->name }}:
        <ul>
        @foreach($livro->user->livros as $outro_livro)
            <li>{{ $outro_livro->titulo }}</li>
        @endforeach
        </ul>
    @endif
</div>


<form action="/livros/{{ $livro->id }} " method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button> 
</form>
@endsection