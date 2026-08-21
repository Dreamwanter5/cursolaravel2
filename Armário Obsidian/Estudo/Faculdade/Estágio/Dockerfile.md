---
tags:
  - Estagio
  - Laravel
---
2026-05-27 - 10:52

Tags: [[Laravel]], [[Estágio]]

# Dockerfile

(guia gerado pelo deepseek.)
## O que é um Dockerfile

Um **Dockerfile** é um arquivo de texto com instruções para o Docker construir automaticamente uma imagem de [contêiner](https://snyk.io/blog/building-production-ready-dockerfile-php/). Pense nele como uma "receita" que descreve o sistema operacional, o ambiente de execução (como o PHP), as dependências e a sua aplicação. Ele permite ter um ambiente **padronizado, portável e isolado** para rodar seu sistema, seja em desenvolvimento ou produção.
Por que isso é útil no seu contexto na USP? Ele resolve o famoso problema "na minha máquina funciona" — você terá uma imagem que roda de forma idêntica em qualquer lugar, independentemente das configurações do servidor. Além disso, você pode rodar versões específicas do PHP, mesmo que o servidor use outra versão, sem interferir em outros [sistemas](https://medium.com/@hafizzeeshan619/using-docker-to-solve-php-version-compatibility-issues-a-practical-guide-6f2e9680dd99).

---

## Instruções principais do Dockerfile

Um Dockerfile é composto por instruções, cada uma criando uma "camada" na imagem. As mais importantes para aplicações PHP/Laravel são:

==Este é o from que devemos utilizar em nossos projetos==: `FROM uspdev/uspdev-php-apache:latest`

| Instrução | O que faz                                                                                                     | Exemplo                                |
| --------- | ------------------------------------------------------------------------------------------------------------- | -------------------------------------- |
| `FROM`    | [Define a imagem base (o "ponto de partida")](https://snyk.io/blog/building-production-ready-dockerfile-php/) | `FROM php:8.3-apache`                  |
| `WORKDIR` | Define o diretório de trabalho dentro do contêiner                                                            | `WORKDIR /var/www/html`                |
| `RUN`     | Executa comandos durante a construção (ex: instalar pacotes)                                                  | `RUN docker-php-ext-install pdo_mysql` |
| `COPY`    | Copia arquivos do seu computador para dentro do contêiner                                                     | `COPY . /var/www/html`                 |
| `ENV`     | Define variáveis de ambiente dentro da imagem                                                                 | `ENV APP_ENV=production`               |
| `EXPOSE`  | Informa em qual porta o contêiner vai escutar                                                                 | `EXPOSE 80`                            |
| `CMD`     | Comando executado ao iniciar o contêiner                                                                      | `CMD ["apache2-foreground"]`           |

``` Dockerfile do projeto 
# Compila toda a imagem do DockerHub

FROM uspdev/uspdev-php-apache:latest


RUN sed -i 's|/var/www/html|/var/www/html/public|' \
	/etc/apache2/sites-available/000-default.conf

  

USER www-data

  

COPY --chown=www-data . .

  

RUN composer install \
	--no-dev \
	--optimize-autoloader \
	--no-interaction

CMD ["apache2-foreground"]
```

---

## Como construir um Dockerfile para Laravel

### 1. Escolha a imagem base correta

Para uma aplicação Laravel com Apache, a imagem oficial do PHP é ideal:

```dockerfile
FROM php:8.3-apache
```

Use uma versão específica, nunca `latest`, para evitar quebras futuras quando a versão do PHP [mudar](https://snyk.io/blog/building-production-ready-dockerfile-php/). Para ambientes de produção que exigem mais desempenho, a versão `php:8.3-fpm` (sem servidor web embutido) combinada com Nginx é uma opção [comum](https://practicaldev-herokuapp-com.global.ssl.fastly.net/jmarcos16/como-configurar-imagem-dockerphp-e-nginx-para-projetos-laravel-com-php-83-23jn).

### 2. Instale as dependências do sistema

Extensões como `libpng-dev`, `libzip-dev`, `libicu-dev`, `git`, `unzip` e `curl` são frequentemente necessárias para instalar extensões PHP e rodar o Composer:
```dockerfile
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libzip-dev \
    libicu-dev \
    curl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
```
### 3. Instale as extensões PHP que o Laravel precisa

Laravel requer algumas extensões para funcionar plenamente. Use o script [`docker-php-ext-install`](https://docs.docker.com/guides/php/develop/)[²](https://medium.com/@hafizzeeshan619/using-docker-to-solve-php-version-compatibility-issues-a-practical-guide-6f2e9680dd99):

``` dockerfile
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    exif \
    pcntl \
    bcmath \
    gd \
    intl
```

- `pdo_mysql` — conexão com MySQL/[MariaDB](https://docs.docker.com/guides/php/develop/)
- `mbstring` — manipulação de strings multibyte
- `zip` — manipulação de arquivos compactados (composer, pacotes)
- `gd` — manipulação de imagens
- `intl` — internacionalização (formatação de datas, moedas)

### 4. Instale o Composer

O Composer gerencia as dependências PHP do Laravel. A maneira mais limpa é usar multi-stage build, copiando o binário do Composer da imagem oficial sem instalá-lo [definitivamente](https://docs.docker.com/guides/php/develop/):

`dockerfile`
`COPY --from=composer:latest /usr/bin/composer /usr/bin/composer`

Ou, alternativamente, baixá-lo [diretamente](https://medium.com/@hafizzeeshan619/using-docker-to-solve-php-version-compatibility-issues-a-practical-guide-6f2e9680dd99).

### 5. Copie os arquivos da aplicação e instale as dependências

`dockerfile`
`COPY . /var/www/html/`
`RUN composer install --no-dev --optimize-autoloader`

O parâmetro `--no-dev` exclui pacotes de desenvolvimento, reduzindo o tamanho da imagem. Se o código for montado via volume (como no desenvolvimento), esta etapa pode ser omitida.

### 6. Configure permissões e servidor web

`dockerfile`
`RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache`
`RUN a2enmod rewrite`

### 7. Exponha a porta e defina o comando de inicialização

`dockerfile`
`EXPOSE 80`
`CMD ["apache2-foreground"]`

---

## Exemplo completo (Apache)

```dockerfile
FROM php:8.3-apache
# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libzip-dev libicu-dev curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*
# Instala extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd intl
# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Define diretório de trabalho
WORKDIR /var/www/html
# Copia arquivos da aplicação
COPY . .
# Instala dependências do Composer
RUN composer install --no-dev --optimize-autoloader
# Configura permissões
RUN chown -R www-data:www-data storage bootstrap/cache
RUN a2enmod rewrite
EXPOSE 80
CMD ["apache2-foreground"]
```
---

## Como saber o que cada Dockerfile precisa?

Para determinar as instruções necessárias para cada projeto, siga estas etapas:
### 📋 Analise o projeto

- **Que versão do PHP o projeto requer?** (verifique `composer.json` ou documentação)
- **Quais extensões PHP são necessárias?** Liste as que aparecem em `"require"` ou são mencionadas na documentação.
- **O projeto precisa do servidor web (Apache/Nginx) embutido?** Ou apenas do PHP-FPM?

### 🔎 Consulte as referências
- [Imagem oficial PHP no Docker Hub](https://hub.docker.com/_/php) — lista todas as extensões disponíveis
- Documentação das dependências do projeto (ex: Laravel, packages específicos)

### 🧠 Use projetos anteriores como ponto de partida

Você notará que muitos projetos PHP/Laravel exigem as mesmas extensões básicas (`pdo_mysql`, `mbstring`, `zip`). Com o tempo, você construirá um modelo mental do que costuma ser necessário, usando cada novo projeto para refinar seu entendimento.

### 🛠️ Teste iterativamente

Construa a imagem e rode o contêiner. Se algo falhar (ex: "extensão tal não encontrada"), volte, adicione a extensão e reconstrua.

---

## Boas práticas essenciais

### Use imagens base específicas

Prefira `php:8.3-apache` em vez de `php:latest`. Quando o PHP 9 for lançado, a tag `latest` atualizaria automaticamente — isso poderia quebrar seu código [silenciosamente](https://snyk.io/blog/building-production-ready-dockerfile-php/).

### Reduza o tamanho da imagem

- Combine vários `RUN` em um único comando, separando com `&&` e limpando o cache no final (como no exemplo). Isso evita camadas [desnecessárias](https://dev.to/victorzarzar/-otimizando-imagens-docker-boas-praticas-para-builds-eficientes-5cj7) .
- Use imagens `-slim` ou `-alpine` para produção. `alpine` é uma distribuição Linux mínima, gerando imagens muito [menores](https://practicaldev-herokuapp-com.global.ssl.fastly.net/jmarcos16/como-configurar-imagem-dockerphp-e-nginx-para-projetos-laravel-com-php-83-23jn)[²](https://dev.to/victorzarzar/-otimizando-imagens-docker-boas-praticas-para-builds-eficientes-5cj7) .
- Aplique multi-stage builds para separar o ambiente de build (onde o Composer instala dependências) do ambiente de runtime [(imagem final menor)](https://dev.to/victorzarzar/-otimizando-imagens-docker-boas-praticas-para-builds-eficientes-5cj7).
### Segurança em primeiro lugar
- Nunca rode o contêiner como `root` em produção. Use `USER www-data` após copiar os [arquivos](https://snyk.io/blog/building-production-ready-dockerfile-php/).
- Não inclua credenciais ou chaves privadas no Dockerfile. Use variáveis de ambiente passadas em tempo de execução (`-e` ou arquivo [`.env`](https://snyk.io/blog/building-production-ready-dockerfile-php/)).
### Cuidado com o cache do Docker
A ordem das instruções importa. Coloque instruções que mudam com menos frequência (dependências de sistema, extensões) **antes** das que mudam com mais frequência (código da aplicação). Isso acelera [reconstruções](https://dev.to/victorzarzar/-otimizando-imagens-docker-boas-praticas-para-builds-eficientes-5cj7)

---

## Por que você provavelmente vai precisar de Dockerfiles diferentes por repositório?

Porque cada projeto pode ter necessidades distintas:
- Um projeto precisa de `gd` (manipulação de imagens), outro não.
- Um usa MySQL (`pdo_mysql`), outro usa PostgreSQL (`pdo_pgsql`).
- Um depende de uma extensão exótica (`imagick`, `redis`), outro é mais simples.
- Versões diferentes do PHP ou do servidor web podem ser necessárias.

Com o tempo, você terá um repertório de "receitas" base. O aprendizado está justamente em saber **quando uma receita serve e quando precisa ser adaptada**.

---

## Como se aprofundar
- **Documentação oficial do Docker**: [Dockerfile reference](https://docs.docker.com/engine/reference/builder/)
- **Imagem oficial PHP**: [hub.docker.com/_/php](https://hub.docker.com/_/php) — consulte sempre para verificar extensões disponíveis
- **Repositórios de exemplo**: [BretFisher/php-docker-good-defaults](https://github.com/BretFisher/php-docker-good-defaults) — um ótimo ponto de partida com boas práticas
**Laravel Sail**: útil para entender a estrutura de um ambiente Docker para Laravel, mas lembre‑se de que ele é voltado para desenvolvimento, não [produção](https://practicaldev-herokuapp-com.global.ssl.fastly.net/jmarcos16/como-configurar-imagem-dockerphp-e-nginx-para-projetos-laravel-com-php-83-23jn)

# Dockerização do sistema

## Copaco ☑️
### Docker✅
O sistema uspdev/copaco está disponível em [https://github.com/uspdev/copaco](https://github.com/uspdev/copaco) e é responsável pela organização dos endereços MAC dos equipamentos da Faculdade. Ele é utilizado para manter um controle eficiente dos dispositivos conectados à rede.

- Permanência do erro ao tentar construir o docker e implementá-lo no sistema: `require php ^7.0 -> your php version (8.5.6) does not satisfy that requirement.`
	Existem elementos que não estão compativeis com a versão utilizada
- É seguro usar o `RUN composer update --with-all-dependencies`? 
Possível arquivo detalhado

desencontros entre composer.lock e composer.json

```dockerfile
FROM uspdev/uspdev-php-apache:latest

RUN sed -i 's|/var/www/html|/var/www/html/public|' \
    /etc/apache2/sites-available/000-default.conf

USER www-data

COPY --chown=www-data . .

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

CMD ["apache2-foreground"]
```

==Como dar docker compose up? Há dificuldades que estão presentes no fato de versões antigas, incompatíveis com o PHP 8.3 estarem dando conflitos.==

- |o docker precisa de **dependências e extensões específicas** eu fiz isso com recursos para além de mim (ia). Ele apresentou muitas dificuldades e ainda não tenho certeza se está em sua melhor versão, o arquivo está grande demais.
- Consegui acessar com o laravel-USP-theme.
### Dusk✅
Tivemos problemas com o **composer.lock**. Precisei reconstruir o sistema, o que levou a soluções do tipo: montar uma nova chave para o app

## empresta ☑️
### Docker✅
*O sistema uspdev/empresta é utilizado no gerenciamento de empréstimos de armários na biblioteca.* 

- Os comandos de dockerização funcionaram sem problemas.
- Houve apenas um problema com o selenium, mas creio que seja só alterar sua porta:
  ``` c
  Error response from daemon: failed to set up container networking: driver failed programming external connectivity on endpoint empresta_selenium (3ac16958bbe163faff96accb8ef6bd10ccf879a5d22bbb70b135d7779b770d1d): Bind for 0.0.0.0:7900 failed: port is already allocated

  ```
- Foi corrigido ao executar um container por vez.
- mas ao acessar a rota padrão `'/'` , **o tema da USP não carrega** e ainda aparece um código de aviso de deprecação:
  `**Deprecated**: Constant PDO::MYSQL_ATTR_SSL_CA is deprecated since 8.5, use Pdo\Mysql::ATTR_SSL_CA instead in **/var/www/html/config/database.php** on line **62**`
### dusk✅

em novas execuções, talvez seja necessário usar `docker compose up --build -d empresta` para uma limpeza definitiva do app antes de utilizá-lo

> The failure was a container permissions mismatch, not a Dusk problem. The running container was UID 1000, but the [vendor](vscode-file://vscode-app/usr/share/code/resources/app/out/vs/code/electron-browser/workbench/workbench.html) tree had been created as `www-data`, so Composer could not write into it. I changed [dockerfile:6](vscode-file://vscode-app/usr/share/code/resources/app/out/vs/code/electron-browser/workbench/workbench.html) so the image copies the app as UID 1000 and runs Composer as that same user, which fixes the writable path.

> If you ever recreate the environment from scratch, refresh the vendor volume once with `docker compose down`, `docker volume rm empresta_vendor`, then `docker compose up -d`. One remaining tradeoff is that the image build still uses `composer install --no-dev`, so Dusk is installed in the dev container at runtime rather than being baked into the image.

Numa segunda visita ao repositório, obtive falhas por conta de problemas de cache. 
## pessoas ☑️
### Docker
- Problemas com versões deprecadas:
``` c
8.034 > @php artisan vendor:publish --provider='Uspdev\UspTheme\ServiceProvider' --tag=assets --force
8.078 
8.078 Deprecated: Constant PDO::MYSQL_ATTR_SSL_CA is deprecated since 8.5, use Pdo\Mysql::ATTR_SSL_CA instead in /var/www/html/vendor/laravel/framework/config/database.php on line 61
8.078 
8.078 Deprecated: Constant PDO::MYSQL_ATTR_SSL_CA is deprecated since 8.5, use Pdo\Mysql::ATTR_SSL_CA instead in /var/www/html/vendor/laravel/framework/config/database.php on line 81
8.147 
8.147    INFO  Publishing [assets] assets.  
8.147 
8.160   Copying directory [vendor/uspdev/laravel-usp-theme/resources/assets] to [public/vendor/laravel-usp-theme]  DONE
8.160 
8.164 > git describe --tags --abbrev=0 > version.txt
8.166 fatal: No names found, cannot describe anything.
8.167 Script git describe --tags --abbrev=0 > version.txt handling the post-autoload-dump event returned with error code 128
------
dockerfile:11
--------------------
  10 |     
  11 | >>> RUN composer install \
  12 | >>>     --no-dev \
  13 | >>>     --optimize-autoloader \
  14 | >>>     --no-interaction
  15 |     
--------------------
ERROR: failed to build: failed to solve: process "/bin/sh -c composer install     --no-dev     --optimize-autoloader     --no-interaction" did not complete successfully: exit code: 128
```

Ele falha na execução do script. `git describe`, porém não há tag git disponível para isso. Resultando no `No names found, cannot describe anything.`

A tentativa de solução se deu por criar uma tag, descrição genérica para tentar executar o script sem ele estar vazio.
- foi feita a adição do `vendor` no **.yml**
- **Clonagem do env com chave local `php artisan key:generate show`
==Todavia, o laravel-usp-theme não estava totalmente implementado, mas eu consegui acessar a aplicação em minha máquina==


### Dusk
Houveram problemas que possivelmente podem ser problemas gerais que estão se repetindo em outros arquivos. Relacionado com a pasta Vendor e algumas outras coisas dos json's.
## monitoring ☑️

**Problemas encontrados**
- Monitoring também precisa atender requisições **Ao usar o latest**
	- ==Utilizando o 8.4, funciona normalmente.

### Dusk e Docker
Para realizar testes futuramente e novas implementações, está sendo necessário que se apague a imagem anteriormente construída para que o sistema não dê problema com imagens existentes. É um conflito de funções

## CorTec ☑️

- Uso do PHP 8.4, sem dificuldades objetivas 
### Dusk
Houveram uma porrada de problemas no que diz respeito a cesso do sistema a certas pastas, muitas delas não possuem arquivos **necessários** e em outras, há delimitações causadas por aplicações que estão atrasadas, como é e foi o caso do Voku.

**Parei em** após construir o novo docker, uma nova imagem, dar o composer build, composer install. Após um composer install, esse é meu último erro:
```
In Filesystem.php line 261:
                                                                          
  /var/www/html/vendor/fakerphp does not exist and could not be created:  
                                                                          

install [--prefer-source] [--prefer-dist] [--prefer-install PREFER-INSTALL] [--dry-run] [--download-only] [--dev] [--no-suggest] [--no-dev] [--no-security-blocking] [--no-autoloader] [--no-progress] [--no-install] [--audit] [--audit-format AUDIT-FORMAT] [-v|vv|vvv|--verbose] [-o|--optimize-autoloader] [-a|--classmap-authoritative] [--apcu-autoloader] [--apcu-autoloader-prefix APCU-AUTOLOADER-PREFIX] [--ignore-platform-req IGNORE-PLATFORM-REQ] [--ignore-platform-reqs] [--] [<packages>...]

```

<small>02.06.26 - 11:00</small>
Pus em standby, vou perguntar para o Ricardo depois.
**finalizado**
Após uma série de testes, confirmamos que os principais problemas residiam na composição do arquivo docker-compose.yml e sua atribuição de volumes. Antecipada por uma séries de testes que excluiam e incluiam novos volumes

## bibfiles☑️

- Uso do php 8.4
- Alteração no build do `docker-compose.yml`
	- Context e dockerfile, correções mínimas.


---

## notas de reunião

Instalar o DUSK nos sistemas 

`ssh-key gen`
`cat ~/.ssh/id_ed25519.pub

``` c
docker exec -it bibfiles composer require --dev laravel/dusk
docker exec -it bibfiles php artisan dusk:install
docker exec -it bibfiles php artisan dusk:chrome-driver
```