<form method="POST" action="/livros/{{ $livro->id }}" enctype="multipart/form-data">
    ...
    @if($livro->imagem_path)
        <img src="/livros/imagem/{{ $livro->id }}" width="200px"> <br>
    @endif
    Imagem: <input type="file" name="imagem" accept="image/jpeg">
    ...
</form>
