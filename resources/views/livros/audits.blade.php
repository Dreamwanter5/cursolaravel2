@extends('layout')

@section('content')

@if($livro->imagem_path)
    <img src="/livros/imagem/{{ $livro->id }}" width="200px"> <br>

    <form action="/livros/imagem/{{ $livro->id }} " method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Deletar Imagem</button> 
</form>
@endif

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

<a href="/livros/excel/?search={{ request('search') }}" class="btn btn-success">
    Exportar Excel
</a>
<a href="/livros/pdf/?search={{ request('search') }}" class="btn btn-success">
    Exportar Pdf
</a>
<br>
<div class="container">
    <h1>Histórico de Edições – {{ $livro->titulo }}</h1>
    <p><strong>Autor:</strong> {{ $livro->autor }} | <strong>Ano:</strong> {{ $livro->ano }}</p>

    @if($audits->isEmpty())
        <p class="text-muted">Nenhuma alteração registrada para este livro.</p>
    @else
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Data/Hora</th>
                    <th>Ação</th>
                    <th>Campos Modificados</th>
                    <th>IP / Navegador</th>
                </tr>
            </thead>
            <tbody>
                @foreach($audits as $audit)
                    <tr>
                        <td>{{ $audit->user->name ?? 'Sistema' }}</td>
                        <td>{{ $audit->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @switch($audit->event)
                                @case('created')   <span class="badge bg-success">Criado</span>   @break
                                @case('updated')   <span class="badge bg-warning text-dark">Alterado</span> @break
                                @case('deleted')   <span class="badge bg-danger">Removido</span>   @break
                                @default           <span class="badge bg-secondary">{{ $audit->event }}</span>
                            @endswitch
                        </td>
                        <td>
                            @if($audit->event === 'updated')
                                <ul class="list-unstyled mb-0">
                                    @foreach($audit->getModified() as $campo => $valores)
                                        <li><strong>{{ $campo }}:</strong> 
                                            {{ $valores['old'] ?? 'vazio' }} → {{ $valores['new'] ?? 'vazio' }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            @php $meta = $audit->getMetadata(); @endphp
                            @if(!empty($meta['ip_address']))
                                IP: {{ $meta['ip_address'] }}<br>
                            @endif
                            @if(!empty($meta['user_agent']))
                                <small class="text-muted">{{ Str::limit($meta['user_agent'], 30) }}</small>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="/livros/{{ $livro->id }}" class="btn btn-secondary mt-3">Voltar ao livro</a>
</div>
@endsection