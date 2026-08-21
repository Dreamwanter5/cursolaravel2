---
tags:
  - Estagio
  - Laravel
---
2026-05-12 10:04

Tags: [[Estágio]], [[Laravel]]

`docker exec -it cursolaravel php artisan tinker --execute="App\Models\Livro::truncate();"` 
^zera os livros


# Atividade Laravel Dia 1

`docker exc -it cursolaravel php artisan` (passa as tabelas do sqllite para mariadb)
## Exercício - Importação de Livros

### 1 - Criar um comando para importar os livros do arquivo csv [livros](https://fflch.github.io/assets/files/livros.csv) no model Livro. Importante:

- No método `handle()`, implemente a lógica para ler o arquivo `livros.csv` e para cada livro, fazer a inserção;
- Dica 1: Para zerar os registros a cada importação, pode-se usar o comando `\App\Models\Livro::truncate()` no começo do método `handle()`.
- Dica 2: Você pode usar a classe `League\Csv\Reader` (disponível via Composer) para facilitar a leitura do CSV.

**Resolução**:

1. Eu precisava fazer com que o código fosse capaz de ler o .Csv, então, pesquisando na internet e com IA eu cheguei a função nativa da biblioteca do PHP `fopen()`. Pus o arquivo livros.csv no diretório principal e por recomendação fiz uso do código de *basepath* para fosse possível utilizar comandos do *php artisan*
	   - Array_combine para juntar cabeçalho e linha.
	   - `docker exec -it cursolaravel php artisan livros:importar`
	~~O código está fazendo uma leitura do cabeçalho e criando variáveis encima disso, após isso, ele faz uma relação de linha e coluna para pegar cada uma das informações e as inserir na página.~~ 
		Inicialmente houve uma tentativa de fazer de fazer uma relação coluna e linha, mas optei pela lógica mais simples, já que o CSV é em si, mais simples. usando o `trim`. Ele até deu um problema de ler o cabeçalho antes de tudo, mas isso foi resolvido ao apenas pedir um `getcsv`antes de executar a função toda.
	1. No fim, a resolução se deu pelo seguinte: Eu precisei pedir ajuda para definir e por o caminho do livos.csv dentro do arquivo. Por recomendações e em razão de otimizar o código, foi usado um `basepath` para evitar possíveis falhas e um `fopen()` para abrir o arquivo. O *livros.csv* acabou por ficar na pasta principal, root. 
	2. Para fazer a listagem de todos os livros do arquivo, foi utilizado uma estrutura de repetição simples com a função nativa do php `fgetcsv` (que lê cada linha do arquivo csv e as divide por uma vírgula.
	   `while (($linha = fgetcsv($arquivo)) !== false) ` - Esse loop de repetição funciona no sentido de: *enquanto* `$linha` tiver conteúdo que vem do `fgetcsv($arquivo)`, esta condicional que está toda enquadrada dentro de um ==()==, enquanto ela existir, enquanto $linha continuar a armazenar, o loop se repetirá. 
	```
	   while (($linha = fgetcsv($arquivo)) !== false) {
		$livro = new Livro();
		$livro->titulo = trim($linha[0]);
		$livro->autor = trim($linha[1]);
		$livro->ano = (int) trim($linha[2]);
		$livro->save();
		$importados++;
	}
	```
	Assim, foi utilizado também $trim$ para polir os caracteres, e como nota-se, as informações retiradas de forma sequencial do banco de dados.
3. Encerrando com um contador de quantos livros foram importados, assim como um `fclose` para encerrar o arquivo. 

---
### 2 - Criar teste Dusk para buscar a string “processo” e deverá ter um assert para ver Franz Kafka e um assert not para José de Alencar;

**Resolução**
1. Indo na pasta de $tests/browser/LivroTest.php$ foi necessário alterar o código para atender a questão do exercício.
2. Adaptando a estrutura de código já presente no site guia de Laravel dia 1, cheguei a esta primeira versão:
   ```
   public function testeKafkaAlencar(){
	$this->browse(function(Browser $browser){
		$browser->visit('/livros')
			->pause(2000)
			->typeSlowly('search', 'processo', 300)
			->pause(2000)
			->press('Pesquisar')
			->pause(2000)
			->assertSee('Franz Kafka');
			->assertDontSee('José de Alencar');
			
	});
   ```
1.  **assertDontSee** foi utilizado para confirmar que não há "José de Alencar" no resultado do teste, com o comando `docker exec -it cursolaravel php artisan dusk tests/Browser/BuscaLivroTest.php` se fez acesso ao arquivo de testes e obteve o seguinte resultado: 
	   ```
		PASS  Tests\Browser\BuscaLivroTest
		✓ e kafka alencar                                                      9.25s  
		
		Tests:    1 passed (2 assertions)
		Duration: 9.40s
	   ```
   

---

### 3 - Criar estatísticas básicas sobre os dados importados

- Criar o controller `EstatisticaController` com um método chamado `stats`.
- Defina uma rota `livros/stats` que aponte para o método `stats`.
- No método `stats` apresente uma tabela com a quantidade de livros por ano.

Exemplo de saída (com dados fictícios):

|ano|quantidade|
|---|---|
|1998|5|
|2001|23|

**Resolução**
1. Alterei os arquivos na pasta de *routes*
2. No **Controller** eu não sai tanto do aplicativo, qualquer assistência a mais eu fiz com o copilot nativo ao VsCode, tive que ler parte da documentação do Laravel para ver o documento que mais se adequava e me reiterar em documentos de banco de dados para categorizar bem. `ano, COUNT(*)` *apelidada* como `total` a quantidade de livros por ano. Um comando chave desta parte é o `selectRAW`, ele é recomendado para combinar a análise de dados de uma coluna com um outro operador tipo o `COUNT(*)`, já que o select normal não aceita. Ele seleciona de uma forma *bruta*. [Mais informações](https://laravel.com/docs/13.x/queries)
   ```
   class EstatisticaController extends Controller
		{
			public function stats()
			{
				$livrosPorAno = Livro::selectRaw('ano, COUNT(*) as total')
				->groupBy('ano')
				->orderBy('ano', 'desc')
				->get();
				
				return view('estatisticas.stats', [
				'livrosPorAno' => $livrosPorAno
				]);
			}
		}
   ```
3. Depois de definir a função com as tabelas, foi necessário exibi-las no view, que ficou com o nome`stats.blade.php` . Fundamentalmente, o que mais importa desta página é o código:
   ```
   @foreach($livrosPorAno as $livro)
	<tr>
		<td>{{ $livro->ano }}</td>
		<td>{{ $livro->total }}</td>
	</tr>
	@endforeach
   ```

#### **Estatísticas Controller**
agrupa por autor
conta os livros por autor
O selectRaw é utilizado para escrever uma consulta SQL bruta, onde 'autor' é a coluna que queremos agrupar e COUNT(*) conta o número de livros para cada autor. O groupBy('autor') agrupa os resultados por autor, e orderBy('total', 'desc') ordena os resultados pelo total de livros em ordem decrescente.
```
<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\View\View;

class EstatisticaController extends Controller
{
    /**
     * Exibe a tabela com a quantidade de livros por ano.
     */
    public function stats(): View
    {
        $livrosPorAno = Livro::selectRaw('ano, COUNT(*) as total')
            ->groupBy('ano')
            ->orderByDesc('ano')
            ->get();

        return view('estatisticas.stats', compact('livrosPorAno'));
    }
}
```
#### **stats.blade.php (polido)**
```
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatísticas — Livros por Ano</title>
    <style>
        body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:#f5f7fb; color:#333; margin:0; padding:24px; }
        .wrap { max-width:900px; margin:0 auto; background:#fff; border-radius:8px; padding:24px; box-shadow:0 6px 24px rgba(25,39,52,0.08); }
        h1 { margin:0 0 12px; font-size:20px; color:#111827; text-align:center; }
        table { width:100%; border-collapse:collapse; margin-top:18px; }
        th, td { padding:12px 14px; border:1px solid #e6e9ef; text-align:left; }
        th { background:#0369a1; color:#fff; font-weight:600; }
        tr:nth-child(even) td { background:#fafafa; }
        .center { text-align:center; }
        .total-row { font-weight:700; background:#f1f5f9; }
        .footer { margin-top:18px; text-align:center; }
        a.button { display:inline-block; padding:8px 12px; border-radius:6px; background:#0369a1; color:#fff; text-decoration:none; }
    </style>
</head>
<body>
    <div class="wrap">
        <h1>Livros por Ano</h1>

        @if($livrosPorAno->isEmpty())
            <p class="center" style="color:#6b7280">Nenhum livro registrado.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Ano</th>
                        <th class="center">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($livrosPorAno as $item)
                        <tr>
                            <td>{{ $item->ano }}</td>
                            <td class="center">{{ $item->total }}</td>
                        </tr>
                    @endforeach

                    <tr class="total-row">
                        <td>Total</td>
                        <td class="center">{{ $livrosPorAno->sum('total') }}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        <div class="footer">
            <a href="{{ url('/livros') }}" class="button">← Voltar aos livros</a>
        </div>
    </div>
</body>
</html>
```

---

### 4 - No método `stats` apresente uma segunda tabela com a quantidade de livros por autor.

**Resolução**
1. A lógica é a mesma que a do exercício anterior, o que me fez enfrentar dificuldades foi porque inicialmente eu pus as variáveis de forma separada, cada um com seu `return`próprio. Depois do primeiro erro, apenas fiz com que ambos tivessem seu próprio return.
2. Tendo corrigido este erro, eu fiz o uso de um bootstrap simples para que as colunas ficassem lado a lado, em prol de uma melhor visualização
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Estatísticas de Livros</title>
</head>
<body>
<div class="container">
	<div class="row g-4">
		<div class="col-12 col-lg-6">
			<h1 align="center">Livros por Ano</h1>
			<table align="center" border="1" cellpadding="10" class="bordered-table">
				<thead>
					<tr>
						<th>Ano</th>
						<th>Quantidade de Livros</th>
					</tr>
				</thead>
				<tbody>
					@foreach($livrosPorAno as $livro)
						<tr>
							<td>{{ $livro->ano }}</td>
							<td>{{ $livro->total }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-12 col-lg-6">
			<!-- Tabela de livros por autor -->
			<h1 align="center">Livros por Autor</h1>
			<table align="center" border="1" cellpadding="10" cellspacing="0">
				<thead>
					<tr>
						<th>Autor</th>
						<th>Quantidade de Livros</th>
					</tr>
				</thead>
				<tbody>
					@foreach($livrosPorAutor as $livro)
						<tr>
							<td>{{ $livro->autor }}</td>
							<td>{{ $livro->total }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div>
	<a href="/livros" >Voltar aos livros</a>
</div>
</body>
</html>

> Por fazer um tempo desde a última vez que eu usei o bootstrap, assim como outros, eu usei IA nesta parte (porém mais)


#### extra
```
<body ">

<div class="container py-4">
	<div class="row g-4">
		<div class="col-12 col-lg-6">
			<h1 class="h4 text-center mb-3">Livros por Ano</h1>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Ano</th>
						<th>Quantidade de Livros</th>
					</tr>
				</thead>
				<tbody>
					@foreach($livrosPorAno as $livro)
						<tr>
							<td>{{ $livro->ano }}</td>
							<td>{{ $livro->total }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-12 col-lg-6">
			<h1 class="h4 text-center mb-3">Livros por Autor</h1>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Autor</th>
							<th>Quantidade de Livros</th>
						</tr>
					</thead>
					<tbody>
						@foreach($livrosPorAutor as $livro)
							<tr>
								<td>{{ $livro->autor }}</td>
								<td>{{ $livro->total }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
		</div>
	</div>
	
	<div class="text-center mt-4">
	<a href="/livros" class="btn btn-primary">Voltar aos livros</a>
	</div>

</div>

</body>
```



---

[[Reunião dia 15.05.26]]
- Depois da reunião, eu editei o arquivo para implementar a biblioteca do Reader, assim ele fica mais de acordo com as padronizações do sistema, o que foi diferente para mim foi a implementação e o funcionamento do getRecords(), que lê cada um dos itens separados por uma vírgula e os põe em um array, permitindo que a criação do objeto fosse facilitada.