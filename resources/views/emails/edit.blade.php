@extends('layout')

@section('content')

<form method="POST" action="/emails/{{ $livro->id }}"  enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    Titulo: <input type="text" name="titulo" value="{{ old('titulo', $livro->titulo) }}">
    Autor: <input type="text" name="autor" value="{{ old('autor', $livro->autor) }}">
    Ano: <input type="text" name="ano" value="{{ old('ano', $livro->ano) }}">
    @if($livro->imagem_path)
        <img src="/livros/imagem/{{ $livro->id }}" width="200px"> <br>
    @endif
    Imagem: <input type="file" name="imagem" accept="image/jpeg">
    <button type="submit">Enviar</button>
</form>