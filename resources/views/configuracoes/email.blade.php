@extends('layout')

@section('content')
<h1>Configurações de email</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('configuracoes.email.update') }}">
    @csrf
    @method('PUT')

    <div>
        <label for="assunto">Assunto</label><br>
        <input type="text" id="assunto" name="assunto" value="{{ old('assunto', $settings->assunto) }}" style="width: 100%;">
    </div>

    <div>
        <label for="corpo_saudacao">Saudação</label><br>
        <input type="text" id="corpo_saudacao" name="corpo_saudacao" value="{{ old('corpo_saudacao', $settings->corpo_saudacao) }}" style="width: 100%;">
    </div>

    <div>
        <label for="corpo_mensagem">Mensagem</label><br>
        <textarea id="corpo_mensagem" name="corpo_mensagem" rows="5" style="width: 100%;">{{ old('corpo_mensagem', $settings->corpo_mensagem) }}</textarea>
    </div>

    <div>
        <label for="corpo_despedida">Despedida</label><br>
        <input type="text" id="corpo_despedida" name="corpo_despedida" value="{{ old('corpo_despedida', $settings->corpo_despedida) }}" style="width: 100%;">
    </div>

    <p>Você pode usar os marcadores <code>{titulo}</code>, <code>{autor}</code> e <code>{ano}</code> no texto.</p>

    <button type="submit">Salvar</button>
</form>
@endsection