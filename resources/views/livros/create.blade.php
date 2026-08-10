@extends('layout')

@section('content')

<form method="POST" action="/livros">
    @csrf
    Titulo: <input type="text" name="titulo" value="{{old('titulo')}}">
    Autor: <input type="text" name="autor" value="{{old('autor')}}">
    Ano: <input type="text" name="ano" value="{{old('ano')}}">
    <button type="submit">Enviar</button>
</form>

@endsection