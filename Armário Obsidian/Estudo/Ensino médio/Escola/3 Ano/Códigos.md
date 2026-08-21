#AulaTécnica #BancodeDadosII #Escola

- ### Filtragem:
	$Seleção:$
	_select_ o que? from from de onde? where filtro?;
	select marca, modelo, cor from veiculos where cor = azul

###### ==Exemplo de um código para login ==
`select empnome, empnume`

##### Att:
- Para usar o formato de data é preciso "" antes.
	- Ex: "YYYY-MM-DD"
	


### Formas e Caractéres

**Upper** - Torna os itens de uma tabela em caixa alta
``update emp set empnome = lower(empnome);``
	A tabela de itens que você deseja deixar em minúsculo deve estar entre parênteses, se você colocar você altera tudo da tabela para "empnome";

---

**Lower** - Torna os itens de uma tabela em letras minúsculas.
``select lower(EmpNome) from emp;

---
**Concat** - De certo modo é como se fosse um system.out do java. Ele exibe dados tabulados com frases.
``select concat(empnume,"-",empnome) from emp;

>esse código retornaria: "Empnume - Empnome"
```
Concat ("O empregado:", empnome, " tem número: ", empunme) from emp;
```
---

A função de ***Substring*** corta uma String/nome em um número a escolha do programador.
Esse "1,15" quer dizer: 1 = A partir do primeiro caractere mais 15 caracteres 
```
select substring(empnome, 1,15) from emp
```

L = Left - Pad
R = Right - Pad
Nesse código ele complementa a partir da esquerda com X
```
select LPAD(empnome, 15, "x") from emp
```

No caso abaixo ele procuraria na tabela de empnome e iria até onde tivesse o primeiro espaço e daria o número de sua posição.
```
select empnome, instr(empnome, " ")
```

Colocando o ==instr== dentro da substring faria com que a tabela deixasse a mostra apenas as palavras depois do primeiro espaço, assim como dentro da condição.
```
select empnome, instr(empnome, " "),
substring(empnome, 1, instr(empnome, "")) Primeiro,

substring(empnome, instr(empnome, " "), 100) from emp;
```
A ultima do linha exibe também os primeiros nomes também

---
_28/09/2023_

<h4>Funções Agregadas</h4>
**Min** - Retorna o menor valor para expor dentro de uma coluna na tabela.
Ex.
``select max(length(empnome)) from emp;``

> Esse código retorna o nome com mais caracteres de algum dado na tabela
> Mas para deixá-lo mais objetivo para a consulta, pode ser feito como: 
```
select empnome from emp where
lenght(empnome) = (select max(lenght(empnome)) from emp);
```

Em um cenário para buscar o maior salário: 

```
select empnome from emp where
EMPSALA = (select MAX(EMPSALA) from emp);
```
>Assim ele retorna o nome com o maior salário da tabela


**AVG** - Calcula a média de valores numa tabela:
`` select AVG(empsala) from emp;`` 

**Count** - Retorna a quantidade de elementos dentro de uma coluna

---

#### Funções Matemáticas

**Power** - Retorna as potências de um valor:
``select POWER(2,8)``
>Nesse caso é 2^8


---

#### 09/11/2023 - REVISÃO

**- EXEMPLO DE UMA SIMULAÇÃO DE UM AUMENTO DE SALÁRIO**

```
Select marca, modelo, valor_venda, 
valor_venda+valor_venda*0.05 as projecao
from veiculos;
```

>Também da para usar x1,05 ao invés de x0,05. Usando o 1, o valor já se auto aplica. 



**- EXEMPLO DE UM CÓDIGO QUE RETORNA APENAS COM UMA EXCEÇÃO**

```
Select marca, modelo, valor_venda, 
valor_venda+valor_venda*0.05 as projecao
from veiculos where valor_venda > 30000 and cor like "B%";
```

O código se torna mais específico, retornando apenas carros acima de 30.000 e que tenham uma cor que começa com a letra "B" graças ao operador **like**, que proporciona uma especificação com base no nome de um elemento:
>Exemplos:
>	"A%" - O nome deve começar com a letra __A__ e pode conter __qualquer letra depois dele__.
>	"%A%" - O nome do item só precisa conter __A__ em __Qualquer parte da palavra__.
>	"%A" - O nome do item precisa terminar com __A__ obrigatoriamente, contendo __qualquer letra antes__.
>	Também é possível usar "Underline" para pular letras em uma palavra.


**- FILTRANDO DATA DE NASCIMENTO**

```
Select * from proprietarios where data_nascimenot between "1991-01-01" and "1995-01-01"
```


**- CONSEGUINDO VALORES EXATOS

```
Select * from veiculos where valor_venda in (3000, 5000, 8000);*
```
> Com esse código ele vai dar o resultado com o valor de venda exatamente igual aos valores em parênteses.


**- QUANTIDADE DE LETRAS NUM NOME**

```
select marca, length(marca) from veículos;
```
> **Length** traz a quantidade de caracteres na linha de marca. ==Ele também pode ser usado na filtragem.==
```
select noome, length(nome) from proprietarios
where lenght(nome) > 15;
```

**- CONTAGEM DE ITENS NA TABELA**
```
select count(valor_venda) from veiculos where valor_venda > 50.000;
```
> *Count* vai dizer quantos veículos tem com valor acima de 50 mil, mas ele __também atua sem uma condição__.


**- SELEÇÃO DE VALORES MÁXIMOS E MÍNIMOS

```
Select max(valor_venda) from veiculos;
```
> Mostra o *maior* valor em "Valor_venda".

```
select min(valor_venda) from veiculos 
where valor_venda > 50.000; 
```
> Ele traz os carros com o *menor* valor entre 50 mil.


**- CALCULO DE MÉDIA** 

```
select avg(valor_venda) from veiculos;
```
> **AVG** traz a *média* entre uma coluna.


**- ORDENANDO ITENS**

```
Select nome, dataNascimento from proprietarios
order by nome desc
```
> Exemplo de código ordenado pela _ordem decrescente._

```
Select nome, dataNascimento from proprietarios
order by nome asc
```
> Exemplo de código ordenado em *Ordem crescente.*


**- SOBRE DATAS**

```
select nome, dataNascimento,
date_add(dataNascimento, intervalo 18 year)
from proprietários 
```
> Código acima mostra o nome e a data que as pessoas completaram 18 anos

Da para usar a palavra **year** para melhor filtrar
```
select nome, year(dataNascimento),
date_sub(dataNascimento, intervalo 9 monty)
from proprietários
```
>Exemplo de data em que a pessoa foi *concebida*.

```
select nome, date_format (dataNascimento, "%W / %m"), 
date_sub(dataNascimento, interval 9 monty) 
from proprietário; 
```
> Mostra a data em que a pessoa foi concebida, porem, com uma exibição de mês diferente


Introduzido na disciplina de [[Engenharia de Software II]] 

## 4º Ano

##### **Juntando tabelas com filtragem**
Nesse contexto, se utiliza um código para encontrar as disciplinas na qual "Julia Neves" está registrada:
```
select * 
from alunos as a
INNER JOIN disciplina_aluno as da
	on da.aluno_id = a.id
where nome = 'Julia Neves';
```

Esse comando junta as duas tabelas em uma só. *Note como usando "as" foi possível simplificar a escrita do código.*

```
Select a.nome as nomealuno, d.nome as noedisciplina
FROM alunos as a
INNER JOIN disciplina_aluno as da
	ON da.aluno_id = a.id
INNER JOIN disciplina as d
	ON d.id = da.disciplina_id
WHERE a.nome = 'Julia Neves';
```

#####  ``20/03/2025

*Having* = Sempre vem acompanhada de um group by. Ele deve vir antes do order by. 