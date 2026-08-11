@if($livro->imagem_path)
    <img src="/livros/imagem/{{ $livro->id }}" width="200px"> <br>

    <form action="/livros/imagem/{{ $livro->id }} " method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Deletar Imagem</button> 
</form>
@endif