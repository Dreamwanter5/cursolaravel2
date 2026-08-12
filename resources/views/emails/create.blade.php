<h1>{{ $corpo_saudacao }}</h1>

<p>{!! nl2br(e($corpo_mensagem)) !!}</p>

<ul>
	<li><strong>Título:</strong> {{ $livro->titulo }}</li>
	<li><strong>Autor:</strong> {{ $livro->autor }}</li>
	<li><strong>Ano:</strong> {{ $livro->ano }}</li>
</ul>

<p>{!! nl2br(e($corpo_despedida)) !!}</p>
