@extends('layout')

@section('content')
@if($livro->id)
Novo livro criado: {{ $livro->titulo }}
@endif
<form method="POST" action="/livros" enctype="multipart/form-data">
    @csrf
    Titulo: <input type="text" name="titulo" value="{{old('titulo')}}">
    Autor: <input type="text" name="autor" value="{{old('autor')}}">
    Ano: <input type="text" name="ano" value="{{old('ano')}}">
    Capa (JPEG): <input type="file" name="imagem" accept="image/jpeg">
    <button type="submit">Enviar</button>
</form>


@endsection