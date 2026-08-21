---
tags:
  - Escola
  - AulaTécnica
---
**25/04**
Também chamado de escalonamento círcular.
- Buscam otimizar o uso da CPU
Existem dois tipos de políticas para o uso de Round Robin, há aquelas que usam preempção e as que não usam.

*Preempção*, é o nome de uma interrupção forçada que acontece numa CPU para que um outro processo de prioridade maior possa utilizar seu processamento. Utilizado em processos pré-programados com o intuito de evitar que um processo ocupe toda a CPU, assim, essas interrupções acontecem em tempos planejados por um relógio de tempo real. Assim quando uma interrupção acontecer, escalonadores terão tempo para reavaliar a lista de processos e definir uma nova ordem de prioridade para sua realização.

**01/04/25**
**O que é**
Usado para escalonamento de processos, pode ser usado para requisição de redes

#### Introdução
	Escalonadores de tarefa (Duda Leme)
			Escalonadores de tarefas são responsáveis por agendarem as tarefas..
	Como funcionam: (Duda Leme)
		Se dividem em escalonadores de curto; médio e longo prazo.		
	Exemplos de algorítimos (Filipe)
#### Desenvolvimento
	Topico estudado: Round Robin (Pedro)
Dentre o nicho de escalonamentos de tarefas, round robin se categoriza como um **algoritmo preemptivo**. Ao concluir uma tarefa pode perder sua prioridade de processamento a partir do instante que termina sua quantidade de tempo planejada ou haja alguma forma de interrupção. O algorítmo preemptivo serve para reavaliar a ordem de prioridade de execução de alguma tarefa do sistema toda vez que ocorre alguma interrupção, exceção ou chamada do sistema.
		O que é (pedro) - Explicar FCFS brevemente
			Round Robin é uma implementação alternativa do FCFS (First-Come-First-Serve). Conhecido também como escalonamento por revezamento, este é o Round-Robin.
			Round Robin é só uma **variante fcfs**
		O que faz (Pedro)
			O Round Robin é caracterizado pelo **revezamento** **entre** **tarefas**, se diferindo de FCFS, ele alterna entre diferentes tarefas baseando-se em sua ordem de prioridade ou demora para ser executada. Por mais interessante que seja, para resolução de tarefa em lotes, ele pode ser menos eficiente. Ele não leva em conta a prioridade de uma tarefa, apenas quanto tempo ela demoraria para ser executada
			-Lógica (como funciona e essas coisa) (filipe)
		Onde é utilizado  (pedro)
			Não recomendado para aplicações interativas, por conta de sua prioridade por quanta(time slice). Pode ser utilizado em um serviço de designação de tarefas para um time. Designando clientes e trabalhadores. Organiaando recente
		- Versões anteriores e o Presente (Filipe)
		
#### Conclusão.
	Exemplos (todes)



