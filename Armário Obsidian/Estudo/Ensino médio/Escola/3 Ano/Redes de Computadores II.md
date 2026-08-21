---
tags:
  - AulaTécnica
  - Escola
---
#### (Recuperado) Aula 2 - 26.09.24

- **Modelo OSI da ISO**
  Feita para permitir que sistema/ máquinas de diferentes tipos se conectem a uma rede só.
  Tudo que se desenvolve tem que enviar seu produto para a ISO e OSI

- Arquitetura ==IP== (internet) utiliza do tipo de topologia física estrela.

**Sobre as Sete Camadas**

7. Aplicação = Responsável pelo encapsulamento junto da apresentação.
6. Apresentação
5. Sessão
4. Transporte
3. Rede
2. Enlace do link de dados.
1. Física

--- 

**RESUMO**
Importante lembrar que os computadores nem sempre interagiam entre si no passado, por isso surgiu a **OSI** e a **ISO**. Camas recebem, compactam. separam e enviam dados.

> **Mini-Glossário**: 
> **GL:** Grupos de trabalho
> 	São responsáveis por fazerem sugestões para **ABNT**
> **OSI**: *International, Standartization, Organization.*
> **Ethernet**: Arquitetura de rede local.
> **TCP/IP:** Modelo multicaminhos, dá a direção de um endereço para os dados viajarem.


---


#### Aula 3 - 03.10.24

Retomando tabelas para fazer uma explicação.

| OSI          | \|  | TCP/IP                 |
| ------------ | --- | ---------------------- |
| Aplicação    | \|  | Aplicação              |
| Apresentação | \|  |                        |
| Sessão       | \|  |                        |
| Transporte   | \|  | Transporte             |
| Rede         | \|  | Inter-Redes (internet) |
| Enlace       | \|  | Host-Rede              |
| Física       | \|  |                        |

Nota-se que o protocolo TCP IP é uma versão otimizada de todo o protocolo OSI.

Para se entender como dados trafegam em certa frequência, podemos voltar para os sinais de televisão: **UHF, VHF, HF, MF, LF**. São ondas **criadas** pelo ser humano
**TODAS ESSAS ONDAS SÃO ONDAS DE RÁDIO**
> ADEMAIS, os sinais **atravessam** objetos sólidos.

F ao final da sigla sifnifica *frequency*.

- **UHF** - > Ultra High Frequency
- **VHF** - > Very High Frequency
- **HF** - > High Frequency
- **MF** - > Medium Frequency
- **LF** - > Low Frequency

> Todas as tecnologias em dado momento vão se encontrar em um ponto de saturação. 

Tecnologias que se tornam ultrapassadas tipo VHF, são **desligadas.**

==Curiosidade, Radioativo, é um elemento que ativamente emite rádio.==

Sinais podem ser bagunçados magneticamente através de imãs. 

---

#### Aula 4, 10/10/24

**Tipos de Transmissão**
- Broadcast -> Uma transmissão para todos.
- Multicast
- Unicast


**Protocolos:** São conhecimentos que ambas máquinas devem ter em uma recepção de dados.
	Interfaces devem ser iguais, senão o que fica entendido se torna ruído.
[[Protocolos, um guia rápido.canvas|Protocolos, um guia rápido]]

![[Pasted image 20241010111845.png|500]]

**TPDU** - Forma de dados utilizados numa transmissão de redes.
==**U**nidade de **D**ados do **P**rotocolo de **T**ransmissão==

**APDU** - Forma de dado utilizada numa aplicação de redes.
==**U**nidade de **D**ados do **P**rotocolo de **A**plicação==

#### Aula 07 - 07/11/24

	- Protocolo MAC
	- Protocolo IP
	- Protocolo TCP/ Protocolo COP

> Só uma menção breve sobre **HZ**, basicamente é uma medida de energia no **SI**. Algo que tem **60 hz**, é o mesmo que algo que completa **sessenta giros em 1 segundo**. Assim funciona geração de energia, como ciclos.

---
##### **Protocolo MAC**

#### Aula 09 - 21/11/24

> Bluetooth usa **micro-ondas**

Sobre camadas de sub redes há 3 elementos que são essenciais
- **HUB**
- **Switch** - Comutador
- **Router** -  Roteador

O roteador possui a função de se conectar com uma rede externa, passar dados pelo enlace que é feito pelo **switch**. 

O tipo de rede que existe num espaço doméstico é **WLAN / LAN**
**WLAN** - Wireles Local Area Network
**LAN** - Local Area Network

Wlan é o tipo de rede mais comumente utilizado em espaços domésticos.

Atualmente surge algo chamado de **IoT**, **Internet das Coisas**, que seria uma interconexão feita por IA em aparatos de uma residência, um exemplo disso seria uma Alexa.

> Algo interessante de saber e pensar Redes de computadores e roteadores, é o fato de que **uma rede está sempre ativa**, assim como um **coração bombeia sangue**. É uma forma do roteador **preparar a rede para quando for necessário utilizar ela**. 

![[Pasted image 20241121113826.png| 600]]

![[Pasted image 20241121114757.png]]

> Uma dúvida interessante sobre micro ondas seria o fato de que é o tipo de onda que serve para transmitir sinais entre satélites. Micro ondas podem ser absorvidas por água, justificando porque a chuva atrapalha sinal de antes parabólicas.


---

#### aula 11 - 05/12/24

O tópico da aula tem sido sobre Ip's. 
Há vários tipos de IPS,  eles podem ser **A, B e C**. Isso para poder aplicar uma lógica de **reserva.** Alguns IPS possuem uma reserva para uso exclusivamente doméstico, enquanto outros, possuem uma reserva para endereços de profissionais. 

<small>Roteadores funcionam como retransmissores de sinais</small>

Nessa mesma lógica de roteadores, ==Gateways== tem a função de redirecionar sinais para uma rede **externa**. O o criador/administrador de uma rede é quem é responsável por definir suas propriedades.

**Para entender redes**

**Classe A:** 10.0.0.0
**Classe B:** 172.16 -``até`` - 172.31
**Classe C:** 182.168.0 - ``até`` 192.168.255

