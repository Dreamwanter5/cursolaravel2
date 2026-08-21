---
tags:
  - HTML
  - css
  - programação
  - Zettelkasten
---
```
- `<input type="button">` \\ Serve para enviar os dados
- `<input type="checkbox">` \\ Permite que o usuário insira mais de um tipo de informação dentro de um cenário

- `<input type="color"> \\ Seleção de cores em RGB pelo usuário.
- `<input type="date">` \\ Seleção de datas
- `<input type="datetime-local">` \\ permite selecionar uma data e também um horário.
- `<input type="email">`
- `<input type="file">` \\ Caso o usuário queira inserir um arquivo, provavelmente terei que utilizar em meu tcc para permitir que usuário consiga inserir suas próprias imagens

- `<input type="hidden">` \\ esconde e altera os dados inseridos pelo usuário
- `<input type="image">` \\ Envia as coordenadas de X e Y clicadas em uma imagem
- `<input type="month">` \\ versão reduzida de Date, permitindo apenas meses.
- `<input type="number">` \\ Campo numérico, pode ter mínimo e máximo e quantidade com que os valores aumentam
  
- `<input type="password">` \\ Permite inserção de texto e o oculta com "*"
- `<input type="radio">` \\ Tipo de seleção de caixinhas, permitindo apenas uma resposta. º 
  
- `<input type="range">` \\ Uma barra de Sliders com limite de valores. Ex: Uma barra de idade alvo.
- `<input type="reset">` \\ Cria um botão que reseta todas informações inseridas.
- `<input type="search">` \\ Barra de Pesquisa
- `<input type="submit">` \\ Comando muito utilizado para enviar respostas de um formulário a uma página em PHP
- `<input type="tel">` \\ Para receber números de telefone usualmente
- `<input type="text">` \\ Barra de texto básica
- `<input type="time">`
- `<input type="url">`
- `<input type="week">`

//Ademais, é possível definir quantidades mínimas de informação inserida logo no input type, através de input's com "min" e "max":

  <label for="datemax">Enter a date before 1980-01-01:</label>  
  <input type="date" id="datemax" name="datemax" max="1979-12-31"><br><br>  
  <label for="datemin">Enter a date after 2000-01-01:</label>  
  <input type="date" id="datemin" name="datemin" min="2000-01-02">

```

#### Restrições de Inputs

<table class="ws-table-all notranslate">
<tbody><tr>
<th style="width:20%">Attribute</th>
<th>Description</th>
</tr>
<tr>
<td>checked</td>
<td>Specifies that an input field should be pre-selected when the page loads (for type="checkbox" or type="radio")</td>
</tr>
<tr>
<td>disabled</td>
<td>Specifies that an input field should be disabled</td>
</tr>
<tr>
<td>max</td>
<td>Specifies the maximum value for an input field</td>
</tr>
<tr>
<td>maxlength</td>
<td>Specifies the maximum number of character for an input field</td>
</tr>
<tr>
<td>min</td>
<td>Specifies the minimum value for an input field</td>
</tr>
<tr>
<td>pattern</td>
<td>Specifies a regular expression to check the input value against</td>
</tr>
<tr>
<td>readonly</td>
<td>Specifies that an input field is read only (cannot be changed)</td>
</tr>
<tr>
<td>required</td>
<td>Specifies that an input field is required (must be filled out)</td>
</tr>
<tr>
<td>size</td>
<td>Specifies the width (in characters) of an input field</td>
</tr>
<tr>
<td>step</td>
<td>Specifies the legal number intervals for an input field</td>
</tr>
<tr>
<td>value</td>
<td>Specifies the default value for an input field</td>
</tr>
</tbody></table>