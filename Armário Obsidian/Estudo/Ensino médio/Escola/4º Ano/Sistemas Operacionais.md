---
tags:
  - AulaTécnica
  - Escola
---
### 25/02/25

#### Sistema Operacional
- Por definição ele seria uma **máquina estendida**
- E também, um gerenciador de recurso.
	Por "Recurso", pode dizer-se *programas*, *componentes* dentro de um computador, etc...
	
	Esse gerenciamento acontece em razão de programas **não executarem tarefas simultaneamente**, de modo, seria correto dizer que as tarefas acontecem de forma *concorrentemente*.
	
	Os processos acontecem em um período delimitado de tempo, uma questão é que esse período é extremamente curto, esse processamento é rápido demais, passando a sensação de ser um processo simultâneo. 
	Esses processos se definem por níveis de prioridade, processos de prioridade mais alta acontecem as vezes em mais tempo, ocupando mais espaço e mais processos.

> Curiosidade: Tempo Real é um critério usado para definir processos quase instantâneo
> **ex**: algo abaixo de 1 milissegundo seria considerado tempo real em uma comunicação entre cidades
> *Em cada cenário, tempo real tem seu próprio critério, tempo real é relativo.*

### 11/03/25

**- Sistemas Operacionais** são *Gerenciadores* de recursos (por "recurso" quero dizer, ``capacidade de processamento, memória, armazenamento, rede, etc.``

	**Sistemas Operacionais e gerenciamento de recursos.**
- Cada programa tem um "tempo" com um recurso e também um "espaço".

> Houve uma breve menção a sistemas de Hardwares.

Conceitos sobre Sistemas Operacionais: **Árvore de Processos**
	Ao abrir um programa, seus subprocessos se tornam seus "filhos", que servem idealmente como subprocessos. Você pode encerrar um processo filho que não encerre o processo pai. 
	As tarefas de um processo na maior parte do tempo acontecem em segundo plano. Mesmo sendo em segundo plano, isso ainda consta que é um processo.

Conceitos sobre Sistemas Operacionais: **Deadlocks**
	Deadlocks (travas mortas), são erros que paralisam o sistema por conta de partes dependentes uma das outras. **A** precisa de algo de **D** para funcionar, **B** precisa de algo de **A** para funcionar, **C** precisa de **B** para acontecer e **D** depende de **C**. 
	Isso gera um loop de dependências capaz de travar o sistema inteiramente.

**Atividade solta no dia**
	1) Quais os tipos de recursos gerenciados pelo S.O.?
	R.=  Dentre os recursos gerenciados por S.O estão a capacidade de processamento, memória, armazenamento, rede, etc.
	
	2) Que tipo de computador executava o processamento em lote?
	R.= Computadores de grande porte, primeiramente utilizados em 1960. Seus "sistemas operacionais" tinham funções desempenhadas por humanos, com um linha de processamento dedicada para cada máquina, até a conclusão do serviço
	
	3) Quais os passos necessários para executar o processamento de uma informação?
	R.= Coleta, Armazenamento, Análise, Organização, Tratamento, Agrupamento e Saída.
	
	4) O que é o “FORTRAN”? (https://fortran-lang.org - https://play.fortran-lang.org)
	R.= Linguagem de programação desenvolvida para aplicação intensiva na área técnica de informática e engenharia, comumente definido como uma linguagem "forte" devido a sua captação de erros. 
	
	5) Pesquise “um” tipo de S.O. para cada uma das “áreas” citadas e descreva as principais características de cada um destes sistemas (cite 4 características para cada S.O.)? 
	Sistemas operacionais:
	a) computadores de grande porte;
	   S.O: Mainframes.
	   Características: 
	    - Escalabilidade;
	    - Confiabilidade;
	    - Eficiência;
	    - Versatilidade.
	
	b) servidores;
	   S.O: Ubuntu.
	   Características: 
	    - Suporte a vários usuários;
	    - Suporte a vários protocolos de rede;
	    - Suporte a vários tipos de aplicações;
	    - Recursos de gestão.
	
	c) multiprocessadores;
	   S.O: Linux.
	   Características: 
	    - Portam mais de um processador;
	    - Possui um endereçamento de memória compartilhado;
	    - Suporte a multitarefas;
	    - Mantém múltiplas filas de processo.
	
	d) computadores pessoais;
	   S.O: Windows.
	   Características: 
	    - Interface de usuário;
	    - Gerenciamento de recursos facilitado;
	    - capacidade de multitarefas;
	    - Interrupção de Hardware.
	
	e) tempo-real;
	   S.O: FreeRTOS.
	   Características: 
	    - Confiável;
	    - Capaz para multitarefas;
	    - Prioriza Tarefas com prazos apertados;
	    - Previsibilidade.
	
	f) embarcados;
	   S.O: macOS.
	   Características: 
	    - Simplicidade;
	    - Confiabilidade;
	    - Flexibilidade;
	    - Customização.
	
	g) cartões inteligentes;
	   S.O: COS (Card Operating System).
	   Características: 
	    - Algoritmo de correção de erros;
	    - Sistema de autenticação próprio;
	    - Podem gerar e armazenar certificados digitais;
	    - Permitem acesso a contas de domínios.
	 
	6) Para que serve o mecanismo de “interrupção”?
	R.= Mecanismos de interrupção (geralmente hardwares) servem para interromper ou iniciar processos à vontade de se usuário, ele sinaliza para a GPU o acontecimento de eventos. Ex: o clique de um mouse, o digitar de uma tecla, etc.
	
	7) O que causa um “deadlock”?
	Deadlocks (travas mortas), são erros que paralisam o sistema por conta de partes dependentes uma das outras. A precisa de algo de D para funcionar, B precisa de algo de A para funcionar, C precisa de B para acontecer e D depende de C.Gerando um loop de dependências capaz de travar o sistema inteiramente.


### Aula 18/03/25

Conceitos sobre Sistemas Operacionais **HIERARQUIA**
	Os arquivos de um disco fazem necessitam com que eles se conectem a uma raiz no processador
	t para que seus dados se tornem acessíveis. Sistemas de armazenamentos removíveis também são assim, eles primeiro precisam passar pelo disco raiz e depois se fragmentar em seus próprios dados.

### Aula 25/03/25

**Modelo** de processos
	Um determinado sistema operacional com apenas um processador realizam diversas tarefas através de uma lógica de **distribuição** de tempo no processamento. Supondo que há 4 atividades a serem executadas, cada um dos itens teria um tempo dedicado para sua realização, esses períodos de tempo se chamam de *Time Slice* na linguagem técnica.

E estes processos precisam de gatilhos para que surjam, exemplos são:
- Iniciar do sistema
- abertura de um aplicativo
- encerramento de um aplicativo.
- ...

Os processos terminam de diversas formas, pode ser *voluntária*, *involuntária*, um erro fatal ou até mesmo, um processo interromper outro.

> Breve comentário sobre **hierarquia de processos**, resumidamente processos pai, criam processos filho, criando uma forma de hierarquia dentro da cadeia de processos. E curiosamente o windows não tem uma hierarquia de processos, se você encerra um processo pai dentro de um sistema Windows, o processo filho pode ficar lá por mais tempo.

A ordem dos processos executados é definido por **escalonadores de tarefas**. Ele lida também com *interrupções* (cliques, digitar de teclas, informações inseridas, etc.)

--

Processos contem dentro de si *n* Threads em si. Por exemplo: O google dispara mais de uma thread no surgimento de seu processo.

### [[Atividade Avaliativa - Round Robin (RR)]]

### Aula 03/06/25

Threads são comandos que são executados simultaneamente com códigos.

### Aula 10/06/25

09:36 
Threads em sistemas operacionais (especificamente na linguagem JAVA), as threads servem como uma programação orientada a objetos. As threads executam códigos que estão no começo da descrição do arquivo, em alguns casos, a função joga o código para o ``run`` do início. 

09:43
É possível que threads possam ser utilizadas simultaneamente a outras threads, no entanto, isso pode ser problemático também.



