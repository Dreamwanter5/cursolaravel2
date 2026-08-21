---
tags:
  - Estagio
  - Laravel
cssclasses:
  - padrao.css
---

2026-06-12 - 10:05

Tags: [[Laravel]], [[Estágio]]

# Reunião do dia 14.08.26

## Questões trabalhadas:

### Memoria Negra

- Da forma em que está agora, o sistema é capaz de extrair dados com um identificador único graças ao `hash`, que coleta os primeiros 16 caracteres e os transforma em hexadecimal. Anulando as possibilidades de repetição.

### Copaco
- Separação das funções do controller em um arquivos `services.php`. Deixando o controller do `KeaController.php`. 

### Cursolaravel
! Importante saber
Todos os códigos que iremos alterar futuramente devem seguir o padrão estabelecido pelos tutoriais de Laravel da STI.
A reunião teve um caráter informativo sobre ferramentas práticas dos sistemas:
1. Padrão a ser seguido
2. Classe observer (ele entende ações e pode servir para disparar comandos de reação)
3. O controller deve ser o mais mínimo possível, pense na lógica de marinheiros tentando esvaziar uma nau enquanto ela está furada.





# Material de Estudo — Dia 4: Além do CRUD (Auditoria + Configurações de E-mail)


## 1. O que o exercício pedia

Do tutorial (Dia 4 — Além do CRUD), duas tarefas, ambas sobre o model `Livro`:

**Exercício 1 — Auditoria**
> Fazer auditoria do model `Livro`, na qual o administrador poderá ver todos os usuários que alteraram um determinado livro e quando. Usar `owen-it/laravel-auditing`.

**Exercício 2 — E-mail configurável**
> Criar rotina de envio de e-mail quando um livro for cadastrado. Em vez de deixar o texto fixo no blade, permitir que o usuário do sistema altere partes do texto por uma área de configuração. Usar `spatie/laravel-settings`.

Ambos partem de uma base do Dia 4 que **já existia antes** desses exercícios: relacionamento `Livro belongsTo User` / `User hasMany Livro`, um `LivroObserver` disparando `LivroCreatedMail` no evento `created`, e um Mailable simples com texto fixo. Essa base não mudou — os exercícios *estendem* ela.

---

## 2. Exercício 1 — Auditoria (`owen-it/laravel-auditing`)

### 2.1 Ideia central do pacote

O `laravel-auditing` funciona assim: você marca um model como "auditável" e, a partir daí, **toda vez que um registro é criado, atualizado ou apagado, o pacote grava automaticamente uma linha numa tabela `audits`** — sem você precisar chamar nada manualmente. Isso é feito escutando os mesmos eventos de Eloquent que um Observer escuta (`created`, `updated`, `deleted`), só que de forma genérica e já pronta.

Cada linha de auditoria guarda:
- **quem** fez a alteração (`user_id` + `user_type`, resolvido pelo guard de autenticação),
- **quando** (`created_at` da própria auditoria),
- **o quê** (`event`: `created`/`updated`/`deleted`),
- **valores antigos e novos** dos campos alterados (`old_values` / `new_values`, guardados como JSON),
- metadados como IP e user agent.

### 2.2 O que foi feito, passo a passo

**Passo 1 — Instalar o pacote.**
```
composer require owen-it/laravel-auditing
```
Confirmado no `composer.json` final: `"owen-it/laravel-auditing": "^14.0"`.

**Passo 2 — Publicar config + migration.**
Isso gera dois arquivos:
- `config/audit.php` — define, entre outras coisas, qual model representa uma auditoria (`OwenIt\Auditing\Models\Audit`) e o prefixo usado para identificar o autor (`user_id`/`user_type`).
- `database/migrations/..._create_audits_table.php` — cria a tabela `audits`, com colunas como `user_id`, `user_type`, `event`, `auditable_type`/`auditable_id` (relação polimórfica — a mesma tabela de auditoria serve para qualquer model, não só `Livro`), `old_values`, `new_values`, `ip_address`, `user_agent`.

Essa tabela usa **relação polimórfica** porque, em teoria, qualquer model do sistema poderia ser auditado usando a mesma tabela — é assim que o pacote generaliza a solução.

**Passo 3 — Preparar o model `Livro`.**
```php
use OwenIt\Auditing\Contracts\Auditable;

class Livro extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasStatuses;

    protected $fillable = ['titulo', 'autor', 'ano', 'user_id', 'imagem'];
    ...
}
```
Duas coisas precisam acontecer juntas: implementar a **interface** `Auditable` (um contrato, dizendo "este model pode ser auditado") e usar a **trait** `\OwenIt\Auditing\Auditable` (que de fato implementa a lógica — escuta os eventos e grava o registro). Uma sem a outra não funciona; é um padrão comum em pacotes Laravel (contrato + implementação).

Reparo importante: o `$fillable` foi adicionado nessa mesma mudança. Isso não é exigência do laravel-auditing em si, mas é uma boa prática que passou a fazer falta porque o controller ainda atribui campos manualmente (`$livro->titulo = ...`) em vez de usar `Livro::create($request->validated())` — ou seja, o `$fillable` está lá mas não é efetivamente usado no fluxo atual de criação.

**Passo 4 — Rota e controller para expor o histórico.**
```php
// web.php
Route::get('/livros/{livro}/audits', [LivroController::class,'showAudits'])->whereNumber('livro');
```
```php
// LivroController.php
public function showAudits(Livro $livro)
{
    $audits = $livro->audits()->with('user')->get();
    return view('livros.audits', ['livro' => $livro, 'audits' => $audits]);
}
```
O método `audits()` **não foi escrito por vocês** — ele vem de graça da trait `Auditable` (é um relacionamento `morphMany` interno do pacote). `->with('user')` evita N+1 queries ao carregar o autor de cada auditoria junto.

**Passo 5 — A view.**
Esse foi o ponto em que você pediu ajuda direta ao DeepSeek, e o histórico da conversa mostra exatamente o erro didático que ele apontou:

> ❌ Primeira tentativa: `{{ $audit->getMetadata() }}` e `{{ $audit->getModified() }}` — **ambos retornam arrays**, e o Blade `{{ }}` tenta converter o valor para string. Isso lança exceção (`Array to string conversion` ou erro fatal, dependendo da versão).

A correção foi iterar sobre os arrays em vez de tentar imprimi-los direto:
```php
@foreach($audit->getModified() as $campo => $valores)
    <li>{{ $campo }}: {{ $valores['old'] ?? 'vazio' }} → {{ $valores['new'] ?? 'vazio' }}</li>
@endforeach
```
`getModified()` só faz sentido para o evento `updated` (é o único que tem "antes/depois"); para `created` e `deleted` a view mostra um badge e um traço (`—`) no lugar da lista de campos, o que está coerente.

**Detalhe de implementação a notar:** a view final (`livros/audits.blade.php`) começou como uma cópia colada de `livros/show.blade.php` — no diff dá para ver que o topo do arquivo é idêntico ao `show.blade.php` (dados do livro, botões de excel/pdf, etc.) e só embaixo entra a tabela de auditoria feita com o DeepSeek. Funciona, mas é duplicação de código que valeria a pena limpar depois (por exemplo, extraindo a parte comum para um `@include`).

### 2.3 Por que isso resolve o pedido do exercício
"O administrador poderá ver todos os usuários que alteraram um livro e quando" = exatamente as colunas Usuário + Data/Hora + Evento da tabela renderizada em `audits.blade.php`, alimentada pela tabela `audits` que o pacote populou sozinho.

---

## 3. Exercício 2 — E-mail configurável (`spatie/laravel-settings`)

### 3.1 Ideia central do pacote

Diferente de guardar configuração num arquivo `.env` ou `config/*.php` (que exige deploy para mudar), o `laravel-settings` guarda valores de configuração **no banco de dados**, mas os expõe no código como se fossem **propriedades tipadas de uma classe PHP comum**. Você define uma classe `EmailSettings extends Settings` com propriedades públicas (`$assunto`, `$corpo_saudacao`, etc.), e o pacote cuida de:
- carregar os valores do banco quando você faz `app(EmailSettings::class)`,
- persistir alterações quando você chama `$settings->save()`.

Isso é o que viabiliza uma "área de configuração" editável pelo usuário sem precisar mexer em código.

### 3.2 O que foi feito, passo a passo

**Passo 1 — Instalar e publicar.**
`composer.json` final confirma: `"spatie/laravel-settings": "^3.9"`.
A migration publicada (`2022_12_14_083707_create_settings_table.php` — a data é do próprio pacote, não do seu projeto) cria uma tabela genérica `settings` com colunas `group`, `name`, `payload` (JSON) e `locked`. Assim como a tabela `audits`, essa tabela é genérica: qualquer classe de Settings do projeto usa a mesma tabela, diferenciada por `group`.

**Passo 2 — A classe `EmailSettings`.**
```php
class EmailSettings extends Settings
{
    public string $assunto = 'Novo livro cadastrado: {titulo}';
    public string $corpo_saudacao = 'Olá,';
    public string $corpo_mensagem = 'Um novo livro foi cadastrado no sistema.';
    public string $corpo_despedida = 'Atenciosamente,';

    public static function group(): string { return 'default'; }
}
```
Os valores nas propriedades são **defaults de exibição**, não os valores reais persistidos — isso é importante para entender o bug do "could not find driver"/save() explicado abaixo.

**Passo 3 — Área de configuração (rota, controller, view).**
```php
Route::get('/configuracoes/email', [ConfiguracaoEmailController::class, 'edit'])->name('configuracoes.email.edit');
Route::put('/configuracoes/email', [ConfiguracaoEmailController::class, 'update'])->name('configuracoes.email.update');
```
```php
class ConfiguracaoEmailController extends Controller
{
    public function edit(EmailSettings $settings) {
        return view('configuracoes.email', ['settings' => $settings]);
    }

    public function update(Request $request, EmailSettings $settings) {
        $validated = $request->validate([...]);
        $settings->assunto = $validated['assunto'];
        ...
        $settings->save();
        return redirect('/configuracoes/email')->with('success', '...');
    }
}
```
Repare que `EmailSettings $settings` é **injetado direto na assinatura do método** — o Laravel resolve isso automaticamente porque o pacote registra `EmailSettings` no container, populado com os dados do banco. É o mesmo mecanismo do route-model-binding que vocês já usam com `Livro $livro`, só que para uma classe de configuração em vez de um Eloquent Model.

A view `configuracoes/email.blade.php` é um form comum (`@csrf`, `@method('PUT')`) com um campo por propriedade, usando `old(..., $settings->propriedade)` para repopular em caso de erro de validação — mesmo padrão já usado em `livros/edit.blade.php`.

Também foi adicionado um link no menu de navegação (`config/laravel-usp-theme.php`), tornando a página alcançável pela interface e não só por URL direta.

**Passo 4 — Usar as configurações no envio do e-mail.**
Esse foi o ponto mais delicado, e onde apareceu o segundo erro sério da trajetória (detalhado na seção 4). A versão final:

```php
// LivroObserver.php
public function created(Livro $livro): void
{
    $settings = app(EmailSettings::class);

    Mail::to('destinatario@email.com')->queue(new LivroCreatedMail(
        $livro,
        $settings->assunto,
        $settings->corpo_saudacao,
        $settings->corpo_mensagem,
        $settings->corpo_despedida,
    ));
}
```
```php
// LivroCreatedMail.php
class LivroCreatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        private Livro $livro,
        private string $assunto,
        private string $corpo_saudacao,
        private string $corpo_mensagem,
        private string $corpo_despedida,
    ) {}

    private function renderText(string $text): string
    {
        return str_replace(
            ['{titulo}', '{autor}', '{ano}'],
            [$this->livro->titulo, $this->livro->autor, $this->livro->ano],
            $text
        );
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->renderText($this->assunto));
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.create',
            with: [
                'livro' => $this->livro,
                'corpo_saudacao' => $this->renderText($this->corpo_saudacao),
                'corpo_mensagem' => $this->renderText($this->corpo_mensagem),
                'corpo_despedida' => $this->renderText($this->corpo_despedida),
            ],
        );
    }
}
```
O detalhe elegante aqui é o `renderText()`: ele permite que o usuário escreva, na área de configuração, um texto com placeholders como `{titulo}`, `{autor}`, `{ano}`, e esses placeholders são substituídos pelos dados reais do livro **no momento do envio**. Isso é o que de fato torna o e-mail "configurável" e não só "com texto diferente fixo".

### 3.3 Por que o Observer/Mailable recebem *strings*, e não o objeto `EmailSettings` inteiro

Isso é o ponto mais importante para você saber explicar, porque é uma pegadinha real de quem usa `ShouldQueue`:

Quando um Mailable implementa `ShouldQueue`, o Laravel não envia o e-mail na hora — ele **serializa** o objeto (com `serialize()`/PHP), guarda essa serialização (banco, Redis, etc., dependendo do driver de fila) e um worker desserializa e processa depois, em outro processo. Para isso funcionar, **tudo que está no construtor do Mailable precisa ser serializável de forma segura** — tipos simples (string, int, array) e Models do Eloquent (que o `SerializesModels` sabe re-hidratar buscando de novo no banco pelo ID) funcionam bem. Um objeto de infraestrutura como `EmailSettings` (que carrega lógica de acesso ao repositório de configurações) não é pensado para ser serializado e reidratado dessa forma — tentar fazer isso gera erro na hora de processar a fila.

A solução, como o Copilot resumiu, foi resolver o `EmailSettings` **antes** de enfileirar (no Observer, que roda de forma síncrona no momento em que o livro é criado) e passar só os **valores já extraídos como strings** para o construtor do Mailable. Assim o que vai para a fila é só texto simples + o `Livro` (que o Eloquent sabe serializar/reidratar sozinho).

---

## 4. Os dois erros de infraestrutura que apareceram no meio do caminho

### 4.1 `could not find driver` (Illuminate\Database\QueryException)

Esse erro é do PDO do PHP, não do Laravel. Ele significa: "PHP tentou abrir uma conexão com o banco (MySQL/MariaDB) mas a extensão `pdo_mysql` não está disponível no ambiente PHP que está rodando". É um erro **de ambiente/Docker**, não de lógica de aplicação.

No contexto da sua conversa, ele apareceu bem no momento em que vocês foram salvar as configurações de e-mail pela primeira vez — ou seja, a primeira vez que o código tentou de fato fazer um `INSERT`/`UPDATE` na tabela `settings`. Faz sentido: até ali, ler os valores default das propriedades da classe `EmailSettings` não precisa necessariamente de banco (dependendo de como o pacote resolve o "primeiro load"), mas `save()` sempre precisa.

Diagnóstico e correção, como o DeepSeek orientou:
1. `php -m | grep -i pdo` dentro do container, para ver se `pdo_mysql` está carregado.
2. Se não estiver, instalar via `docker-php-ext-install pdo_mysql` (ou garantir que a imagem base já traz isso — imagens como `uspdev/uspdev-php-apache` normalmente já vêm com o driver, mas builds customizados podem ter perdido a extensão).
3. Conferir `.env` (host, porta, nome do banco, usuário/senha corretos).
4. Reiniciar o container para a extensão ser carregada.

### 4.2 Linhas de settings inexistentes antes do primeiro `save()`

Esse é um problema mais sutil e específico do `laravel-settings`, e é o motivo de existir o `EmailSettingsSeeder.php`:

O pacote, na versão usada, **não cria automaticamente uma linha no banco só porque a classe `EmailSettings` tem uma propriedade com valor default**. O default de `public string $assunto = '...'` é só um valor de PHP usado, por exemplo, se o pacote precisar de um fallback de exibição — mas o fluxo normal de leitura/gravação espera que já exista uma linha em `settings` para aquele `group` + `name`. Se a linha não existe, operações de update/save podem falhar (dependendo da estratégia do repositório).

A solução foi criar `EmailSettingsSeeder`, que faz um `updateOrInsert` manual na tabela `settings` para cada propriedade, garantindo que as linhas existam desde o início — assim `$settings->save()` sempre tem uma linha para atualizar, em vez de precisar criar uma do zero.

---

## 5. Linha do tempo consolidada (cruzando as três fontes)

1. Base do Dia 4 já pronta (relacionamentos, Observer, Mailable com texto fixo) — não fazia parte do exercício, mas é o ponto de partida.
2. Você recorre ao DeepSeek admitindo que não sabia por onde começar o **Exercício 1** (auditoria).
3. DeepSeek propõe um roteiro em 5 passos (instalar → publicar → preparar model → rota/controller → view) **sem** dar código pronto de cara — te fez implementar model e controller sozinho.
4. Você volta com model e controller prontos, pedindo ajuda só na **view**.
5. Primeira versão da view usa `{{ $audit->getMetadata() }}` / `{{ $audit->getModified() }}` diretamente → erro, porque são arrays. DeepSeek corrige para iterar com `@foreach`.
6. View final funcional entregue, com tabela, badges por tipo de evento e tratamento de metadados.
7. Você avança para o **Exercício 2** (e-mail configurável), e o DeepSeek propõe outro roteiro de 5 passos (instalar → classe `EmailSettings` → tela de edição → adaptar envio de e-mail → testar).
8. No meio da implementação, aparece o erro `could not find driver` — problema de ambiente Docker/PDO, não do exercício em si. Resolvido ajustando a extensão `pdo_mysql` do container.
9. Ao testar salvar as configurações, aparece o problema das linhas de settings inexistentes — resolvido com o `EmailSettingsSeeder`.
10. Ao testar o envio de e-mail via fila, aparece o erro de serialização do `EmailSettings` no job enfileirado — resolvido extraindo os valores como strings simples antes de montar o Mailable.
11. Import de livros (`ImportaLivros`, comando Artisan já existente do Dia 3) volta a rodar sem erros depois dessas correções, confirmando que o problema era mesmo de infraestrutura e não de lógica de negócio.

---

## 6. Onde o resumo do Copilot precisa de ajuste

Comparando o resumo do Copilot com o **diff real do código** (versão que revisei antes vs. versão final), há itens que não se confirmam — importante você saber disso para não repassar informação incorreta se alguém perguntar:

| Afirmação do Copilot | O que o diff do código mostra |
|---|---|
| "Fixed the Gate import in IndexController.php" | `IndexController.php` está **idêntico** nas duas versões — não houve nenhuma mudança nesse arquivo. |
| "Fixed the book create flow so the view gets a $livro object... cleaned the create view logic" | `LivroController.php` só ganhou o método `showAudits()` a mais. O bug real que identifiquei na review anterior — em `store()`, o código usa `$livro->imagem_original_name = ...` **antes** de `$livro = new Livro;` ser declarado — **continua exatamente igual, não foi corrigido**. Mesma coisa para o código morto depois do `return` em `create()`. |
| "Fixed the PDF/Excel route conflict by moving static routes before /livros/{livro}" | As rotas de `excel`/`pdf` **já estavam antes** das rotas com `{livro}` em `web.php`, em ambas as versões — não houve reordenação. |
| "Added the missing User::livros() relationship" | `User.php` está **idêntico** nas duas versões; o relacionamento `livros()` já existia antes desses exercícios. |
| "Fixed the audits page path mismatch by using audits.blade.php" | Isso é real e verificável: a view foi criada em `resources/views/livros/audits.blade.php`, batendo com `view('livros.audits', ...)` no controller. |
| "Added the email settings feature..." | Real e verificável em detalhe (seção 3). |
| "Updated the mail flow so it uses configurable settings and stays queue-safe" | Real — é exatamente a mudança descrita na seção 3.3. |
| "Added a menu link to the settings page" | Real — confirmado no diff de `config/laravel-usp-theme.php`. |
| "Added EmailSettingsSeeder.php and seeded initial settings rows" | Real — arquivo existe e faz sentido com o problema descrito na seção 4.2. |

**Conclusão prática:** os itens relacionados aos dois exercícios do Dia 4 (auditoria e e-mail configurável) batem com o código. Os itens que o Copilot descreveu como correções em arquivos que já existiam antes (Gate, rota PDF/Excel, relação `User::livros()`) provavelmente descrevem coisas que já estavam certas desde antes, ou foram corrigidas numa etapa anterior que não está capturada nesse par de zips — não dá pra confirmar isso com o material que temos. O bug real que ainda existe (`$livro` indefinido em `store()`) **não foi corrigido** e continua quebrando o upload de imagem no cadastro de um livro novo.

---

## 7. Perguntas para você treinar a explicação

1. **Por que a tabela `audits` usa relação polimórfica em vez de ter uma tabela `livro_audits` dedicada?**
   Porque o pacote foi desenhado para auditar qualquer model do sistema com a mesma tabela — `auditable_type` + `auditable_id` identificam a qual model e registro cada linha pertence.

2. **Por que `{{ $audit->getModified() }}` quebrava a view?**
   Porque o método retorna um array associativo (campo → [old, new]), e o Blade `{{ }}` faz um cast para string, que não é definido para arrays.

3. **Qual a diferença entre `config/*.php` tradicional e `spatie/laravel-settings`?**
   Config tradicional é lido de arquivo, fixo até um novo deploy. `laravel-settings` guarda os valores no banco e os expõe como propriedades tipadas de uma classe PHP, permitindo edição em runtime pela interface.

4. **Por que não dava para simplesmente passar `EmailSettings` inteiro no construtor do `Mailable`?**
   Porque o Mailable implementa `ShouldQueue`, e o job precisa ser serializado para ir para a fila; um objeto de configuração/repositório não é pensado para esse ciclo de serialização/reidratação, ao contrário de tipos simples e Models do Eloquent.

5. **O que o `renderText()` no `LivroCreatedMail` resolve, na prática?**
   Permite que o texto configurado pelo usuário tenha placeholders (`{titulo}`, `{autor}`, `{ano}`) substituídos pelos dados reais do livro no momento do envio — sem isso, "configurável" seria só trocar um texto fixo por outro texto igualmente fixo.

6. **`could not find driver` é um bug de lógica da aplicação?**
   Não — é um problema de ambiente (extensão PDO ausente no PHP do container), não relacionado à lógica do exercício.

7. **Por que era preciso um seeder para as configurações de e-mail, se a classe já tem valores default nas propriedades?**
   Porque esses defaults são só valores de PHP para quando não há dado gravado; o fluxo de update/save do pacote espera encontrar uma linha existente no banco para aquele grupo/nome — o seeder garante que essa linha exista desde o início.




