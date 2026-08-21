---
tags:
  - Laravel
  - Estagio
---

2026-05-25 - 07:13

Tags: [[Laravel]], [[Estágio]]


## Extra
<small>Estou seguindo o vídeo tutorial da reunião</small>

1. Seguir o pacote de instalação do tema padrão da USP.
2. Aprendendo a centralizar o login
	1. Enviamos as informações básicas e os sites da USP fazem o restante]
3. Eu precisei alter os arquivos no `.env`, no `dockerfile` e no `docker-file.yml`, tudo isso em necessidade de implementar o senhaunica-faker que é o sistema utilizado para simular os sistemas reais da USP.
4. Migrations de alteração 
	Para fazer algumas mudanças, não é possível que nós apenas escrevamos algo no mesmo arquivo, é necessário criar um outro arquivo de migration, este que será executado e ai sim, a mudança será aceita. 
5. Validações.
	1. Cria um arquivo único dentro da pasta de requests que imbui regras. É uma função que já era existente com o controller anteriormente, mas dessa vez, ele está separado em seu próprio arquivo, por uma questão de organização
6. **Permissions**
`bash`
Comando para subir dentro de um container.

> **Função importante**: `middleware('auth')`
> 

# Atividade Laravel Dia 3

## Exercício 3

1. No exercício anterior, inserir o usuário no model de frases como nullable, e restringir o cadastro somente para usuários cadastrados, guardando o id do respectivo usuário que está realizando o cadastro; ✅
	 **Resolução**
	   1.  Criação das migrations através do comando `php artisan make:migration add_user_id_to_frases_table --table=frases`. Por consequência, agora os métodos também salvam informações relativas ao id do usuário que está logado.
	   2. Verificação da autenticação do usuário: foi-se utilizado o middleware('auth') que verifica se o usuário está logado. A implementação deste comando foi feita nas ==rotas== do sistema também.
	   3. "fiz" um bônus onde agora há uma nova tabela para mostrar o último usuário que editou uma frase.
2. Alterar o Dusk do exercício anterior (frases) para realizar todos os testes com um usuário logado, para isso será necessário criar o usuário durante o teste; ✅
	1.  **ALTERAR ARQUIVO NO .ENV**
	2. O teste encontra complicações porque o método `oauth()` está protegendo a página, não permitindo que o Dusk, um teste externo, a acesse. Depois encontrei dificuldades para acessar a página porque ela solicitava a permissão de um **boss** para acessar o tema laravel. A correção foi sendo trabalhada com a função de print do dusk. 
	3. Foi necessário conferir uma sequências de permissões diferentes para que ele pudesse acessar a página de teste
3. Faça uma migration de alteração para adicionar o campo pontuação para a frase (entre 0 e 10 - validação com FormRequest); ✅
4. Faça um mutator converter a virgula, quando existir, para ponto. ✅
5. Corriga seus formulários para sempre conterem a função old() ✅
	1. A questão com o mutator foi um ctrl + c ctrl + v direto do último exercício.


---

# backlinks

[[Atividade Laravel Dia 1]]