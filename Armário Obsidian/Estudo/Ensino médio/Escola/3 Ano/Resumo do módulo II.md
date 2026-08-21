---
tags:
  - Escola
  - AulaTécnica
---
``Notas Adicionais
>Topologia Lógica é o processo da passagem de informações constante de um computador para o outro e assim em diante.

#### Meios de Transmissão

> Meios de transmissão diferem com relação à banda passante, potencial para conexão ponto a ponto ou multiponto.

Sua escolha é de tremenda importância e para RC's (Redes de Computadores), **qualquer** meio de transmissão pode ser utilizado. Os mais comuns são *cabos trançados*, *cabo coaxial*, e *fibra óptica*.

<h6> Cabo Coaxial: O cabo fininho de televisão </h6>
- **Estrutura:** Ele é constituído por uma condutor interno circundado por um condutor externo, entre eles há um **dielétrico** como divisor. Para tapar o condutor externo, é usado uma camada isolante.

Há vários tipos de cabos coaxiais, alguns são imunes a ruídos, outros são mais apropriados para transmissões de **alta frequência**

- **Transporte de dados:** Consegue transportar dados na velocidade de *megabits* por segundo sem a necessidade de regeneração de sinal e distorção de ecos.

Em comparação com o *cabo trançado*, o cabo coaxial tem uma **fuga eletromagnética** bem menor,  ele também é um cabo **mais caro**

``Vantagens``
1. A proteção do cabo coaxial permite que com que ele tenha bastante comprimento.
2. Emite pouco ruído.
3. Uso de redes BroadBand
4. Mais barato que o cabo trançado blindado

``Desvantagens``
1. Ele não é flexível, tornando-o fácil de ser quebrado.
2. Se usado em uma topologia linear, o cabo pode prejudicar a rede toda caso quebrar se usado em uma topologia linear.
3. Mais caro que o trançado **sem** blindagem
4. Está caindo em desuso.
	   isso porque a taxa máxima de transferência dele é de 10mbps

Ele é um cabo que tem ficado obsoleto, as vezes ainda é usado em pequenas lojas ou meios domésticos mas ele vem sido substituído pela fibra óptica. Ele também é uma solução barata para lidar com fortes influência magnéticas, comparado com o trançado desencapado

##### Ruído e Atenuação
- Os cabos não podem ter comprimento infinito, certo que conforme a distância, a informação  do sinal vai perdendo sua força consequentemente ficando mais fraco. O sinal se afetado por **ruídos** no caminho, podem ficar **corrompidos**. Esses ruídos são gerados por **interferências eletromagnéticas**.
- Esse problema da atenuação é resolvido com o uso de um repetidor, que como o nome diz, irá repetir o sinal para que ele atinja uma maior distância. Segundo os slides, todos os dispositivos da atualidade possuem um repetidor embutido.
##### Características
- Comprimento máximo de 185m e um limite de 30 computadores conectados a uma só rede.
*Perguntar se vai cair montagem*

{Aqui contém muitos detalhes de montagem exata, perguntar se é mesmo necessário saber de tudo.}

##### Fibra Óptica
- Transmite sinais através de sinais luminosos ao invés de sinais elétricos
- Comparado ao Coaxial e o Par Trançado, a fibra óptica usar luz para transmitir sinais a torna imune a interrupções por ruídos, tornando a transmissão bem mais rápida.
- Mais seguro pois não conduz eletricidade.
- menos necessidade no uso de repetidores

- O cabo possui duas fibras, uma pra transmissão e outra para recepção. Formando assim uma comunicação **full-duples**
- Por ser uma tecnologia recente, infelizmente a fibra-óptica é **cara**  
- Vai haver uma variação entre tipos MMF (Multiple Mode Fiber) e SMF (Simple Mode Fiber), correspondendo a forma como a luz é transmitida.
	  As do modo múltiplo são mais grossas que o modo simples, gerando feixes de luz que ricocheteiam na fibra gerando sinais múltiplos, quanto maior o cabo, maior o problema
	  Os de Feixe único não ricocheteiam e chegam direto ao receptor, por isso tem um desempenho e comprimento maior.
- O tamanho pequeniníssimo da fibra-óptica torna difícil alinhar o feixe de luz com a placa.
- A montagem deste tipo de cabo apresenta uma alta dificuldade devido ao nível de precisão exigido ao alinhar o cabo e a placa, qualquer diferença no encaixe faz com que as informações não passem vice-versa.

### Par Trançado
- Cabo mais popular atualmente, á a versão com blindagem e a versão sem blindagem. UTP e STP (Unshielded e Shielded)
- É possível usar a versão unshielded com mais viabilidade porque ele usa técnicas de cancelamento e não blindagem. As informações circulam repetidas em dois fios e em outros dois fios de cobre sua polaridade é invertida.
- Mas há chance de os fios corromperem os dados de fios ao lado por conta do campo eletromagnético gerado pela passagem de dados. Esse campo eletromagnético gerado vai conforme a direção em que o dado trafega
- O fato dos cabos irem em duplas ajuda o receptor a verificar se a informação veio corrompida ou não, porque ele faz uma checagem em ambos os cabos, a única diferença entre eles é a polaridade invertida.
- Ele é barato, acessível e flexível
- É vulnerável a interferências eletromagnéticas, e sua distância máxima é de 100 m
- Há toda uma quantidade de funções com base na cor do cabo. mt trampo
- Faz ligação pino a pino.