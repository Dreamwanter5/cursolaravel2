---
tags:
  - AulaTécnica
  - Escola
---
[[Redes de Computadores II]]

(Perdi a primeira Aula)
##### Aula 2 - 22/02/2024

<ul type="square">
<li><b>Lan: </b>Local Area Network</li>
<li><b>W-Lan: </b>Local Area Network <b>WIRELESS (Sem fio)</b></li>
<li><b>Man: </b>Metropolitan Área network</li>
<li><b>Wan: </b>Wide Área Network (É a internet)</li>
</ul>

 > Para que haja a conexão de internet adequada, é necessário uma comunicação entre portas **WAN** e **LAN**                              |                                **WAN**  <->   **LAN**

###### Para o Tráfego de informações, existem duas possibilidades

1. De computadores para computadores
	 e
 2. Um envia para todos

Isso se chama de ***TOPOLOGIA LÓGICA***. 

----
#### Aula 3 - 29/02/2024

==***TOPOLOGIA FÍSICA***==

<ul>
<li>Como os PC's são interligados</li>
<li>É o Arranjo dos computadores da rede.</li>
</ul>

#### - MODOS: _BARRAMENTO_

- **Anel**
	![[Pasted image 20240229093559.png]]
	Ele passa de computador para computador, seguindo o modo de topologia de **UM PASSA PARA O OUTRO.**
	[^2 ]A transmissão acontece **Apenas** quando um dispositivo carregar os dados, se ele não tiver nada novo para enviar, ele apenas envia o mesmo pacote para o aparelho seguinte.
	Sua utilidade ao condicionar os usuários da rede pode servir para corporações particulares como o funcionamento. Mas ele caiu em desuso por conta de congelar a rede.
 
-  **Estrela**
	![[Pasted image 20240229093428.png]]O tipo de estrela se consiste em uma central onde os dados trafegam de um dispositivo central até um PC. **A informação trafega na topologia lógica de "Todos p/ todos de uma vez"

- Barramento
	Ele passa de computador para computador, seguindo o modo de topologia de **UM PASSA PARA O OUTRO.**
	 ``Na topologia BUS, a informação destinada
	 ``a um computador específico ficava
	 ``disponível no meio compartilhado, e
	 ``acessível aos vários computadores
	 ``conectados.
	![[Topologia de rede.png | 350]]


>**AO** conversar sobre redes e ligação entre computadores, é importante destacar o funcionamento dos compartimentos de armazenamento dentro dos "Discos do PC", tipo "Disco local C:", etc. Dentre estes, se destaca a ==Rede Y:== que é uma rede interligada a computadores conectados a mesma **HUB**. Assim funciona na instalação de *Drivers*. Se envia informação para um computador de outra rede, e ele retorna pra o usuário

``Existem tipos de sistema, sistemas para clientes e sistemas para servidores`` 
``O Sistema de servidores é capaz de proteger a pasta de um usuário, garantindo a segurança ao impedir outros de acessarem sua pasta. Um exemplo desse sistema é o próprio GOOGLE DRIVE``

O ``Software de Clientes`` seria incapaz de fazer a funcionalidade explicada acima.

#### Tipos de rede quanto ao ==S.O== (Sistema Operacional)

Baseada em servidores: ``S.O. Servidor`` 
1. _DEDICADO_ (Usa recurso do servidor.)
	- Não usados pelo usuário.
	
2. *NÃO DEDICADO* (Usa recurso da máquina)
	- Usuário utiliza como PC normal 
3. Tipo **PEER to PEER** (ponta a ponta) - ``S.O de Clientes`` 
	- Menos recursos de segurança e personalizada

---

#### Aula 04 - 07/03/2024

- **Dados** trafegam através de ``Pacotes de informação`` 


 Para garantir que mais de um computador consiga usar *rede* de modo adequado, a navegação de dados é feita em **Pequenos pacotes** para impedir **o Monopólio de rede**. 
  Uma exemplo prático deste caso seria downloads grandes. Eles demoram pois são repartidos em vários outros pequenos pacotes para impedir o monopólio de rede.

---

#### Aula 05 - 14/03/2024

``Métodos de acesso ao meio``
![[Sequencial vs Acesso aleatorio.png | 500]]
> Método de acesso aleatório, muito utilizado para justamente evitar a colisão de dados na rede, uma vez que se confrontados diretamente, eles não conseguem trafegar simultaneamente.
>  Esse também é um método que pode ser chamado de `Colision Avoidance`

**C**arrier
**S**ense
**M**ultiple
**A**cess
**C**olision 
**D**etection
##### **CSMAD-CD**
Esse método testa a portadora; Se livre, avisa que esta pronta para transmitir, entrando em um estado de espera esperando pelos dados. 
 Este método é **BEM RÁPIDO** porque é o sistema de tráfego de redes **por cabos**, mesmo diante de alguma colisão, o dado consegue ser enviado novamente quase que de imediato. 

``Por esta razão, sistemas de rede conectados por cabo são mais rápidas to que um método de acesso por wireless.`` 

> Sobre pacotes é interessante comentar que enquanto um pacote trafega indefinidamente, o pacote **morre**. Ele **não** pode trafegar por muito tempo na rede pois **consome internet demais**.

  ###### A rede jamais para, ela constantemente é testada e transmitida.

#### Parâmetros de Comparação - **Custo**

*  Dividido entre o custo das estações de processamento, custo das interfaces com o meio de comunicação e o custo do próprio meio de comunicação.
- Depende do desempenho que se espera. Baixo e médio desempenho tem poucas estações com demanda de dados e tráfego pequeno. Interfacesde baixo custo.
- Alto desempenho requerem interfaces de custo mais elevados, devido em grande parte ao protocolo utilizado e ao meio de comunicação.

#### Parâmetros de Comparação - **Retardo de transferência**

- ==Vamos definir o que é o retardo de transmissão e retardo de acesso.==
- É o tempo que leva para o dado conversar entre os métodos de acesso ao meio, é a simples demora deste processo todo
#### Parâmetros de Comparação - **Desempenho**

- O tipo de dado e o desempenho da rede ao trafegar estes dados por ela.
#### Parâmetros de Comparação - **Confiabilidade**

- É a confiabilidade a ser avaliada entre tempos médios de seu uso.
Fundamental para prevenir possíveis falhas no servidor e também nos aparelhos que o sustentam.
#### Parâmetros de Comparação - **Modularidade**

- É o grau de alteração de desempenho e funcionalidade que a rede pode sofrer sem mudar seu projeto original. 
- Benefícios da arquitetura modular: a facilidade de modificação da rede original para se adaptar conforme a novas necessidades.
#### Parâmetros de Comparação - **Compatibilidade**

-  É a capacidade que a rede tem de interagir com dispositivos diferentes em uma rede. No passado esse problema se apresentava por exemplo através da conversa de dispositivos Windows e dispositivos Linux.
#### Parâmetros de Comparação - **Sensibilidade Tecnológica**

- Deve conseguir abraçar as mudanças tecnológicas a vir no futuro e prever estes avanços.
==Exemplo: Trocar roteadore para poder sustentar uma rede mais forte==.

---
#### 30/07/2024 - 20:53
##### [[Resumo do módulo II]]
