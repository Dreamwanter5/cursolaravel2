---
tags:
  - AulaTécnica
  - Escola
---
#### Para começar : Recepção de informações.
```
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade Final</title>
</head>

<body>
    <form action="pagina.php" method="post">
        Nome da pessoa: <input type="text" name="nome"> <br>
        Email da pessoa: <input type="text" name="email"> <br>
        Telefone: <input type="text" name="telefone"> <br>
        <button>Enviar</button>
    </form>
</body>
</html>
```

Essa é uma estrutura de código básica que atua na parte do **HTML** servindo o propósito de coletar informações que posteriormente seriam usadas em um código em **PHP**. 

Em essência, toda informação adquirida chega ao programa através de um ==método==, neste caso, o método utilizado seria o **POST**. O **Post** é um vetor de capacidade ilimitada que guarda diversos valores travados por seus nomes, por isso a aba de **name** dentro do *input*.

#####  [[Tipos de input]] : Saiba todos os jeitos que um site recebe informações

#### **Criação de Classes:**

Há elementos muito necessários de serem observados quando se cria uma classe. Um que é a definição das variáveis como **Public** ou **private**. A diferença é: O quão acessível a variável pode ser. Se ela for private, significa que apenas o arquivo que contém a importação de seu código vai poder utilizar da classe e de seus atributos.

Quando uma classe é criada, ela normalmente começaria sem seus atributos, por isso surge a função **construct**, para determinar que quando uma classe seja criada, ela já venha com alguns atributos pré-definidos em seus atributos.

Quando se cria uma função dentro de uma classe que depende de suas próprias variáveis, utiliza-se o comando `$this->variável`, essa é uma forma de entender que você está **referenciando o próprio código para a criação de uma variável.**
****

```
class Animal{
    private $nome;
    private $idade;
    private $peso;
    private $tipo;
    private $raca;

    // A partir de agora é mais prominente usar métodos para obter e para devolver nomes, é algo mais seguro que evita falhas

    // function __construct(){
    //     $this->setNome("A inserir");
    //     $this->setIdade(100);
    //     $this->setPeso(1000);
    // }
  
    //Ao criar um construtor dessa forma, eu tenho um método especial obrigatoriamente chamado quando eu crio o objeto que necessita desses parâmetros para existir.

    function __construct($nome, $idade, $peso, $tipo, $raca){
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->setPeso($peso);
        $this->setTipo($tipo);
        $this->setRaca($raca);
    }        

    // GetNome serviria para poder retornar um nome, é basicamente uma forma garantida de dar eco

    function getNome(){
        return $this->nome;
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function getIdade(){
        return $this->idade;
    }
    function setIdade($idade){
        $this->idade = $idade;
    }
    function getPeso(){
        return $this->peso;
    }
    function setPeso($peso){
        $this->peso = $peso;
    }
    function getRaca(){
        return $this->raca;
    }
    function setRaca($raca){
        $this->raca = $raca;
    }
    function getTipo(){
        return $this->tipo;
    }
    function setTipo($tipo){
        $this->tipo = $tipo;
    }
}
?>
```
****
Dentro de uma Classe, também é possível inserir diversas funções do que torná-la apenas uma caixinha que recebe *X* tipo de informação. Por isso surgem os métodos **Get** e **Set**, para fazer que o usuário consiga alterar/inserir dados em uma variável. 

Uma função não se restringe a apenas códigos de obtenção de informações, elas também podem emitir frases inteiras personalizadas pelo usuário.

```
function exibirPessoa(){

return "Nome: {$this->nome}<br>Telefone: {$this->email}<br>E-mail: {$this->email}
}
```

Essa seria uma função que apresenta os dados inseridos em um atributo ao longo da função.
___
**Cálculos de Condicionais**
```
function calcularParadas($distancia, $eficiencia, $tamanho_tanque) {
	
	$eficiencia_tanque = $this->eficiencia * $this->tamanho_tanque;
	
	$paradas = 0;
	
	if ($eficiencia_tanque == 0) {
	
	return "O tanque está vazio, você precisará abastecer antes de começar.";
	
	} elseif ($distancia <= $eficiencia_tanque) {
	
	return "Nenhuma parada será necessária. O carro pode completar a viagem sem reabastecer.";
	} else {
	$paradas = ($distancia / $eficiencia_tanque) - 1;
	return "Você precisará fazer $paradas parada(s) para reabastecer durante a viagem.";
	            }
}
```
Esse é o exemplo de um código que calcula de maneira personalizada a eficiência de um tanque com base em informações inseridas pelo usuário.

> Nota-se que quando se insere as variáveis dentro dos "()" da função, significa que a função depende daqueles atributos para funcionar corretamente.
---

**Exemplo do código em ação:**

```
<?php

    include("carro.php");

    $placa = $_POST["placa"];
    $eficiencia = $_POST["eficiencia"];
    $tamanho_tanque = $_POST["tamanho_tanque"];
    $ano = $_POST["ano"];
    $distancia = $_POST["distancia"];

    $carro = new Carro($placa, $eficiencia, $tamanho_tanque, $ano);

    $carro->receberAtributo($placa, $eficiencia, $tamanho_tanque, $ano);

    $resultado = $carro->calcularParadas($distancia, $eficiencia, $tamanho_tanque);

    echo ("Para a distancia percorrida de: ".$distancia."km, ".$resultado);

?>
```


#### **Criação de Conexão com um banco de dados**

A criação de um banco de dados deve ser feita como mais atenção, pois ocorre uma intersecção com o uso de **MySQL**.

``$produto = new PDO("mysql:host=localhost: 3306;dbname=produto", "root", "");``

Na estrutura desse código,  é necessário entender o seguinte:
- **PDO** = Ele é como se fosse uma ==classe== já pronta pelo PHP para permitir a conexão com o banco de dados
  
Há **3** segmentos essenciais na hora de criar um **PDO**, o **endereço da conexão**(mysql>host=localhost), o **nome da database a ser acessada**(dbname="Produto") e o nome de **usuário**(root) e **senha** ("")

___ 

Agora que há uma conexão com o banco de dados, é necessário saber como enviar informações para ele, isso acontece através do comando $query$:

```
$query = "insert into produto (nome, descricao, categoria, preco, estoque) values (:nome, :descricao, :categoria, :preco, :estoque)";
```

O query em sua essência seria o comando que junta e forma uma linha de código que deve ser inserida dentro do MySQL direto do Visual Code, pense nele como um carro com malas pronto para viagem.

>	Nota-se que os *values* estão inseridos como ":nome", isto é, para evitar problemas como **mysql injection**, após montar o query, se monta um parâmetro que identifica o texto e corrige o formato para enviar o texto como "$nome".

```
$parametro = [
    ":nome" => $nomeProduto,
    ":descricao" => $descricao,
    ":categoria" => $tipo_categoria,
    ":preco" => $precoProduto,
    ":estoque" => $quantidadeEstoque
];
```

Assim, prepara-se um query para enviar o código, e após preparar o query, executa-se o statement para "limpar" o código.

```
$statement = $produto -> prepare($query);

$statement -> execute($parametro);
```

Para saber que o código deu certo, pode-se checar o ID do produto inserido:
```
$produto2 = $produto->lastInsertId();

echo("Produto de id $produto2 foi inserido com sucesso");
```

Agora que as informações estão cadastradas no banco de dados, é necessário acessá-las. Isso é feito através do comando `fetch all`

```
$query = ("select * from produto");

// Sempre Bom lembrar que o Query é um comando que envia uma linha de código para o mysql

$statement = $produto->prepare($query);
$statement->execute();
$retorno = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($retorno as $linha){
    $nome = $linha["nome"];
    $preco = $linha["preco"];
	echo("Nome: ".$linha["nome"]. " Preço: ".$linha["preco"]." Categoria: ".$linha["categoria"]." Descrição: ".$linha["descricao"]." Quantidade em Estoque: ".$linha["estoque"]);

    echo("<br>");
    echo("<br>");
}
```

Desse modo, agora está pronto um código que exibe as informações e também mostra de maneira organizada em uma linha só.

---

###### Aula 09/10/2024

##### Passagem rápida por HTML

**Criação de Tabelas**

Importante separar o que é a *Head* e também os conteúdos de uma tabela.
```
<table>
        <thead></thead>
        <tbody></tbody>
</table>
```
Table Head para definir os títulos, tipos em cima
Table body para definir os conteúdos

```
<table border="1">
        <thead>
            <!-- tr = Linha de Coluna -->
            <!-- Insere-se "td" depois de definir a TR -->
            <tr>
                <td>Nome</td>
                <td>Preço</td>
                <td>Estoquersons</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>pipipi</td>
                <td>popopo</td>
                <td>pepepepe</td>
            </tr>
            <tr></tr>
            <tr></tr>
        </tbody>
    </table>
```

TR = Linha da tabela
Após inserir a linha da tabela, é necessário inserir a ``TD``, que seria o conteúdo 

| tr¹ TD | tr¹ TD |
| ------ | ------ |
| tr² TD | tr² TD |
#### Mescla de HTML e PHP

É possível fazer com que HTML se integre com PHP em um mesmo arquivo.

```
echo("<li >nome do produto: {$linha["nome"]} valor do produto: {$linha["preco"]}</li>")
```
note que: Está em ==aspas== únicas porque está inserida dentro de um echo

Desse modo, o ``echo`` em PHP vai inserir a tag de *list item* no meio de seu texto.

Ademais, caso queira **estilizar** o texto, também é possível inserir tags de CSS no meio do PHP

```
echo("<li class='vermelho'>nome do produto: {$linha["nome"]} valor do produto: {$linha["preco"]}</li>")
```
 
**Anotações Gerais do dia**

Chega a ser meio quebra cabeça, inserir PHP dentro do HTML, existe muito cuidado na hora de executar e colocar em prática, isso ficou a prova com a dificuldade que encontrei ao apresentar os dados da tabela em SQL para o HTML. Numa análise mais concreta a estrutura deve ser da seguinte forma

**Iniciação de conexão em php**
``Código em HTML``
**PHP no meio**
``Encerra HTML``

Quando ocorre essa inserção de PHP no meio, é onde pode ficar confuso, porque ao depender do que você quer alterar, você precisa inserir métodos no meio do HTML ao mesmo tempo que inserir tags e outros recursos, então fica um texto amalgamado estranho. EX: 

```
<table border="1">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Estoque</th>
                <th>Descrição</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $retorno = $statement->fetchAll(PDO::FETCH_ASSOC); //Utilizar esse comando dentro do PHP no meio da tabela faz com que  os dados sejam descarregados para serem inseridos na tabela.
            foreach($retorno as $linha){
                $id = $linha["id"];
                $nome = $linha["nome"];
                $preco = $linha["preco"];
                $desc = $linha["descricao"];
                $cat = $linha["categoria"];
                $preco = $linha["preco"];
                $estoque = $linha["estoque"];
                echo("<tr>");
                echo("<td>$id</td>");
                echo("<td>$nome</td>");
                echo("<td>$preco</td>");
                echo("<td>$cat</td>");
                echo("<td>$estoque</td>");
                echo("<td>$desc</td>");
                echo("<td>opções</td>");
                echo("</tr>");
            }
        ?>
        </tbody>
    </table>
```

Só uma anotação bônus quanto ao ``fetch``, finalmente entendi melhor como ele mesmo funciona. A função **Retorno** serve puramente para puxar uma função JÁ EXISTENTE que nesse caso é o *statement* ``fetchAll(PDO>>FETCH_ASSOC)``. O que esse comando faz em sua essência é puxar uma linha contendo todos os dados de uma tabela

**06/11/24 - aula 7**

Introdução do conceito de um ``usuariocontrol`` que seria basicamente a função de controle. Essa função serve o propósito de estabelecer uma conversa entre o *view* (HTML) e o **banco de dados**

> Funções dentro de outras funções

Na conclusão da aula ficou a criação de uma ==Tela de Login==

---

**04/12/24**

Após criar o código que possui um **CRUD** semi-completo, tem-se como parte teórica do projeto uma organização em pastas como ``view, control e data``. Em especial a pasta de ``data`` seria onde se encontra os **dao's** do sistema, que seriam os **Data Access Object**: Um código onde o usuário pode ir para acessar as características de um objeto e todas suas variáveis.

``Control`` Seria a parta que faz o tratamento dos usuários.

Para que um usuário possa devidamente ter acesso a apenas produtos cadastrados por si próprio, é necessário o uso constante de **chaves estrangeiras**, que se dão pela lógica destas seguintes tabelas aqui: 
```
CREATE TABLE usuario(

    id int auto_increment primary key,

    nome text,

    email text,

    senha text

);

  

CREATE TABLE categoria(

    id int auto_increment,

    nome text

);

  

CREATE TABLE produto(

    id int auto_increment primary key,

    nome text,

    descricao text,

    fk_id_categoria int,

    preco numeric(15,2),

    estoque int default 0,

    fk_id_usuario int,

    constraint fk_produto_usuario foreign key (fk_id_usuario) references usuario (id),

    constraint fk_produto_categoria foreign key (fk_id_categoria) references categoria (id)

);
```

Neste caso, nota-se que primeiro sempre se cria uma ``fk_id_algumacoisa``, ela como um valor **int**, assim, a tabela esta pronta para receber a chave estrangeira de uma outra tabela. Auxiliada pela linha de código:
**constraint** fk_produto_categoria foreign key (fk_id_categoria) **references** categoria(``id``);

Isso faz com que a a FK seja uma foreign key em referência ao id da da tabela categoria. 

```
Join categoria on categoria.id = produto.fk_id_categoria
```

Essa é uma forma de fazer com que colunas de diferentes tabelas se conversem.



