---
tags:
  - Estagio
  - Laravel
---

2026-05-18 - 12:28

Tags: [[Laravel]], [[Estágio]]

# Laravel Dia 2

### Exercício 1


**Enunciado**
- Criar um CRUD completo para o model frases.

**Resolução**
O CRUD por si só foi um tanto simples, foi mais uma questão de dar CTRL + C e CTRL + V no CRUD já existente do tutorial. O que foi diferente em si foi a inclusão de uma nova tabela específica para as frases na pasta de `database`. Uma ==Nova pasta nas *views*== com três novos arquivos: `frases.blade.php index.blade.php show.blade.php`. Inicialmente tive problemas com a importação das frases. Todos os arquivos necessário haviam sido criados, mas o site não carregava. Após eu usar o comando da signature `frases:importar` obtive outro erro, que foi solucionado logo em seguida com o comando do `docker exec -it cursolaravel php artisan migrate`, que **migrou as tabelas do SQLite** para o modelo do site.


Foi necessário criar um arquivo próprio para as migrações, uma nova tabela no banco de dados que possuía três atributos essenciais `id, 'dia_semana' e 'texto'`

**3. DUSK**
```
   PASS  Tests\Browser\FraseCrudTest
  ✓ crud frases                                                                                   15.21s  

  Tests:    1 passed (13 assertions)
  Duration: 15.37s

```

Seguindo a mesma lógica, não foi muito complicado, já que era necessário apenas copiar os elementos do CRUD para o dusk.

---

- [x] Criar uma classe dusk que testa todas funcionalidades do CRUD frases
- [x] Criar um comando, importarfrases, que importa o arquivo csv: [frases](https://fflch.github.io/assets/files/frases.csv)
- [x]  Criar uma rota `/frasedodia` e o método correspondente que ao ser acessada mostra uma frase aleatória, porém correspondente ao dia da semana.

http://localhost:8000/frasedodia

---
# Backlinks

[[Atividade Laravel Dia 1]]