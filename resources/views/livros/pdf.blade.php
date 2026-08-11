@extends('laravel-fflch-pdf::main')

@section('content')

<h1>Relação de Livros</h1>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
        </tr>
    </thead>
    <tbody>
        @foreach($livros as $livro)
        <tr>
            <td>{{ $livro->titulo }}</td>
            <td>{{ $livro->autor }}</td>
            <td>{{ $livro->ano }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection