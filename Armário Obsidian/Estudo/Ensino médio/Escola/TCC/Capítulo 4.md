---
tags:
  - TCC
  - Escola
  - AulaTécnica
---
> Antes de dar continuidade a esse tópico, acredito que seja válido eu esperar até eu ter a aula que de fato vai falar sobre esse tópico, eu meio que me perdi e dado o nível de conhecimento que tenho agora, eu poderia assistir a aula e aprender a transcrever o conteúdo para cá, pegar a consulta e depois adicionar citações que encorpem o texto.


**27/02**
	Não necessariamente uma solução prática do meu problema, mas o início de um planejamento, o professor se dispôs a me ajudar e me orientar como programar o TCC e suas ferramentas, ele se consistiria da seguinte forma, ele pode criar links externos e para editar o texto dentro da página, um switch de markdown para exibição do texto em HTML. *Isso pode ser feito com javascript*. Arquivos de texto pode potencialmente ser um dos menores do problemas, agora devo começar a me aperfeiçoar na programação, vejo assim. 

``` Comentários Fabrício
1. Faltou os métodos no diagrama de classes;  
2. Dúvida, verificar a necessidade de subcategorias;  
3. Verificar a questão da associação de notas, categoria e usuário, deixar semelhante entre o diagrama de classes e DER.
```

### Desenvolver os seguintes tópicos:

Em outras palavras, assim como os arquitetos criam plantas e projetos para serem usados por uma empresa de construção, os arquitetos de software criam diagramas UML para ajudar os desenvolvedores de software a construir o software. Se você entender o vocabulário da UML (os elementos visuais do diagrama e seus significados), poderá facilmente entender e especificar um sistema e explicar o projeto desse sistema para outros interessados.  (Pressman, 2018, p. 869)

#### 4. Modelagem de Análise de Projeto

Análise é o estudo do problema para que se chegue a um projeto e estabeleça uma solução.
- Estudo do problema e desenvolvimento da solução
- Modelar o sistema de uma forma que ele possa ser entendido por outras pessoas.

*Um sistema* é um conjunto de peças e ferramentas que interagem entre sí.

Uma análise se desenvolve por trás de uma análise de um caso, um estudo detalhado que sirva para partir e entender como desenvolver uma solução para esse problema através de um conjunto de peças e ferramentas que vão interagir entre si. 

- De certo modo em uma ordem de acontecimentos, há em primeira instância, a criação de um modelo seguido pela aplicação deste modelo, essa aplicação pode ser estrita ou não, mas o que importa é que seja seguido esse padrão estabelecido.

>"Todos modelos estão errados mas alguns são uteis"

A capacidade de análise permite definir ferramentas que aceleram o processo de desenvolvimento, é a investigação minunciosa de algo.  Partindo para o projeto, ele seria uma forma de estabelecer uma solução lógica através de diferentes tipos de recursos. 

Requisitos de usuário != Requisitos de sistema

Os requisitos de usuário são ordens mais simples que se dá ao sistema, EX: eu quero que o sistema emita relatórios para todos os produtos que eu vender em dado período de tempo. 
E assim, os requisitos do sistema cobririam o papel técnico nessa negociação, o projetista deveria escrever um sistema mais detalhado usando uma linguagem técnica, dentro do exemplo de um sistema que emita relatórios. O projetista descreveria que o sistema antes de ser encerrado enviaria os respectivos dados de vendas para uma aba própria na qual o usuário não necessariamente solicitasse, o processo seria feito de forma automática, assim, se tornando uma funcionalidade no qual o usuário não sabe da existência, no entanto, quando o usuário solicitasse acesso ao recurso de relatórios, ele os teria sua disposição. Um conceito específico seria a declaração técnica passo a passo de um processo. 

> Explicar "Engenharia de requisitos"

Requisitos não funcionais como restrições

Programar é legal -> não precisa de planos -> isso meio que é verdade -> Leva a falhas possivelmente. 

Os modelos fornecem uma planta do projeto de um sistema. Os modelos poderão abranger planos detalhados, assim como planos mais gerais com uma visão panorâmica do sistema considerado. Um bom modelo inclui aqueles componentes que têm ampla repercussão e omite os componentes menores que não são relevantes em determinado nível de abstração. Todos os sistemas podem ser descritos sob diferentes aspectos, com a utilização de modelos distintos, e cada modelo será, portanto, uma abstração semanticamente específica do sistema. Os modelos podem ser estruturais, dando ênfase à organização do sistema, ou podem ser comportamentais, dando ênfase à dinâmica do sistema.

#### 4.1 diagrama de caso de uso
Transformar markdown em html
#### 4.2   diagrama de classe
No que tange a gama de diagramas disponíveis pela UML, o diagrama de classes se localiza entre o nicho de diagramas de implantação e diagramas de componentes. Ele é o meio termo que permite a visualização técnica adequada de detalhes de funções dos sistemas e seus atributos e como elas podem ser inseridas ao decorrer do trabalho. Mostrando um conjunto de classes e suas informações, de forma gráfica, esse diagrama se identifica como um conjunto de tabelas ligadas por arcos ou retas.

Apesar de outros diagramas também apresentarem características similares, como o nome e a exibição gráfica, o diagrama de classes se destaca pelo seu conteúdo em particular, contendo o nome, atributos e relações de dependência, generalização e associação. Em sua composição gráfica, estas informações se apresentam dentro de um retângulo, dentro deste retângulo há mais repartições na horizontal, onde se delimita o título de uma classe, seguido pelos atributos que as constituem. Cada um destes atributos podem portar um nome, um tipo de informação que guarda e uma visibilidade. 

Um diagrama de classe fornece uma visão estática ou estrutural do sistema. Ele não mostra a natureza dinâmica das comunicações entre os objetos das classes no diagrama. (Pressman, 2018, p. 869)

![[Pasted image 20250311185208.png]]

> Contribuição do deepseek
> 	No que tange à gama de diagramas disponíveis na UML, o diagrama de classes ocupa um lugar central entre os diagramas de implantação e os diagramas de componentes. Ele serve como uma ferramenta essencial para a visualização técnica detalhada das funções do sistema, seus atributos e como esses elementos se relacionam ao longo do desenvolvimento. Por meio de uma representação gráfica, o diagrama de classes exibe um conjunto de classes e suas informações, conectadas por arcos ou retas, organizando-se de forma semelhante a um conjunto de tabelas interligadas.
	Embora outros diagramas também compartilhem características como a exibição gráfica e a identificação de elementos por nomes, o diagrama de classes se destaca por sua capacidade de representar, de maneira clara e estruturada, o nome das classes, seus atributos, métodos e os relacionamentos entre elas, como dependências, generalizações e associações. Graficamente, cada classe é representada por um retângulo dividido horizontalmente em seções: a primeira contém o nome da classe, a segunda lista seus atributos (com nome, tipo e visibilidade) e a terceira exibe os métodos. Essa organização permite uma compreensão rápida e precisa da estrutura do sistema.
	No entanto, é importante ressaltar que o diagrama de classes fornece uma visão estática ou estrutural do sistema, como destacado por Pressman (2018, p. 869): 'Um diagrama de classe fornece uma visão estática ou estrutural do sistema. Ele não mostra a natureza dinâmica das comunicações entre os objetos das classes no diagrama.' Essa característica o torna ideal para modelar a arquitetura do sistema, mas não para representar comportamentos dinâmicos ou interações em tempo de execução
#### 4.3   diagrama de MÁQUINA DE estados

---
**Possíveis citações:**
> Uma máquina de estados é um comportamento que especifica as sequências de estados pelos quais um objeto passa durante seu tempo de vida em resposta a eventos, juntamente com suas respostas a esses eventos
---

No decorrer de dito projeto, segue-se o instante no qual se faz necessário fazer uso do diagrama de máquina de estados, que se encarrega da função específica de atribuir uma dinamicidade ao sistema proposto. No decorrer do projeto, as ditas classes ou objetos são sujeitas a diversas alterações que surgem conforme a interferência do usuário no sistema, e em resposta a cada uma dessas ações/interferências, há uma reação. A máquina de estado se responsabiliza de tornar visível esta linha lógica do projeto, com toda ação gerando uma reação, se torna visível através de um diagrama. 

Compreende-se que o uso de máquinas de estado permitem melhor coesão entres os eventos que acontecem dentro de um projeto, servindo para tornar claro eventos capazes de atingir diferentes funções de um sistema só, cada uma dessas funções podem surgir em mérito de interrupções feitas pelo usuário como o pressionar de um botão, ou em casos de tecnologias mais sofisticadas, eventos podem ser desencadeados por via de recepções de diferente informações através de sensores. 

> Um estado é uma condição ou situação na vida de um objeto durante a qual o objeto satisfaz alguma condição, realiza alguma atividade ou aguarda um evento. Um objeto permanece em um estado por uma quantidade finita de tempo. Por exemplo, um Aquecedor em uma casa poderá estar em um dos quatro estados: Ocioso (aguardando um comando para começar a aquecer a casa), Ativando (o gás está ligado, mas está aguardando chegar à temperatura), Ativo (o gás e o circulador estão ligados) e Desligando (seu gás está desligado, mas o circulador continua distribuindo o calor restante do sistema)

Sobre sua representação gráfica, diagramas de máquinas de estado constituem-se do uso de retângulos com bordas arredondas, cada um desses retângulos se responsabiliza por representar um estado em específico, eles se ligam com outros estados por meio de linhas que vão ser chamadas de "transições", elas servem para indicar a modificação que acontece no processo de transição de um estado a outro. Essa interação seria o processo mais fundamental deste diagrama, no entanto, antecedendo os diversos tipos de estados de um sistema, há um estado inicial e um estado final, eles se responsabilizam respectivamente por dar inicio ao processo que há de ser representado em algum diagrama. 

Um exemplo desta linha lógica de funcionamentos através de um diagrama de máquinas de estado demonstra-se à seguir a partir na representação de um sistema de termostato elaborado por Booch; Rumbaugh e Jacobson  (2012, p. 448)

![[Pasted image 20250314114300.png]]

Máquinas de estado possuem *transições*, *objetos* e estados
#### 4.4   diagrama de entidades e relacionamentos

Introdução do tópico pela vista de o que os autores dessas ideias idealizavam em sua criação

O diagrama de Entidade Relacionamentos (ER) se apresenta como um fluxograma, fazendo o uso de blocos de informações que contém informações do tipo entidades, cada uma respectivamente com seus atributos, concomitante aos relacionamentos que uma entidade pode ter com outras. Por mais que tenham uma aparência que pode ser assimilada a um diagrama de classes, os gráficos ER se diferenciam pela sua utilidade no desenvolvimento de bancos de dados, essa é uma técnica que entrou em vigor na modelagem de dados por via de Peter Chen (1976) que introduziu esta metodologia no ramo da engenharia de software, em via disto, seria correto dizer que a UML e seu diagrama de classes possuem fortes inspirações no modelo de Chen, que continuou sendo utilizado ao decorrer dos anos no séc. XXI.

Diagramas de entidade relacionamento se destacam no que diz respeito a como facilitam o processo da montagem de informações de dado banco de dados de um sistema, possuindo uma flexibilidade que permite sua aplicação em projetos mais curtos ou projetos maiores, nestes casos, pode se apresentar como uma ER estendida. Segundo Pereira, Franck e Dantas Filho (2021) que entidades servem para representar elementos de algum nicho da vida real, como por exemplo um funcionário, este funcionário possui atributos, e eles podem variar entre si, desde seu nome, cpf até sua idade de nascimento, cada um destes dados pode ser armazenado de formas diferentes. Todavia, um diagrama adequado não apresentaria apenas uma entidade, em casos mais adequados, há entidades que se complementam, armazenando informações diferentes, nesta lógica, seria possível introduzir uma entidade de "departamento", com seus atributos próprios, agora a entidade de "funcionário" teria outro objeto com a qual poderia se relacionar dentro do diagrama. Natathe e Elmasri (2005) é possível que existam vários tipo de de determinado atributo em um diagrama: simples versus composto, multivalorado versus multivalorados, derivado versus armazenamento. Cada um destes atributos pode ser dividido em subclasses, usando "identidade" como um exemplo, sua composição pode se dar por via dos atributos "RG", "CPF", "Numero", "Nome" e "Idade". 

Todas ligações existentes dentro de um ER possuem devida coesão em mérito da funcionalidade dos relacionamentos dentro do diagrama, um relacionamento serve para estabelecer uma ligação entre  diferentes entidades, servindo para contribuir com mais dados e coesão do diagrama estabelecido, cada relacionamento, representado por uma linha que liga diferentes atributos, pode ser acompanhado por uma cardinalidade, por exemplo 1:N, que significaria que um setor pode conter mais de um empregado, no entanto, o empregado pertence a apenas um setor. Dentre as cardinalidades possíveis, estão 1:1, 1:N, N:1 e M:N (Elmasri e Navathe, 2005). 

Entidades podem se diferenciar em sua classificação, isso em mérito de conter uma chave primária ou não, caso não haja esta chave, a entidade recebe a nomenclatura de "fraca". A razão disto se encontra na necessidade de um atributo especial, uma "chave primária", ele seria uma informação que não se repete em entidades do mesmo tipo. Sua utilidade se demonstra a partir da interação com diferentes entidades em uma mesma exibição, seguindo o exemplo citado anteriormente, uma entidade "departamento", ao se ligar com um usuário através de uma relação, ela herda a chave primária do usuário, assim, permitindo criar um registro único de uma entidade naquele sistema.

De forma gráfica, o DER se mostra como um quadro em branco contendo retângulos divididos por duas partições, na parte superior se encontra o nome de uma entidade, com o texto em negrito, sequencialmente, abaixo do título se se encontra os atributos dessa entidade,, junto de seus nomes estão os tipos de dados que eles armazenam respectivamente, dentre esses atributos pode se encontrar primeiro sua chave primária caso a tenha, e ao fim está as chaves estrangeiras, chaves primárias advindas de outras entidades, que são criadas a partir das ligações com cardinalidades como explicado de antemão, as cardinalidades estão representadas nas pontas de cada ligação. A seguir, é possível se observar pela figura 19, o diagrama de entidade e relacionamentos do projeto desenvolvido por este trabalho.


![[Pasted image 20250324111738.png]]

> deepseek ver
> O Diagrama de Entidade-Relacionamento (DER) se apresenta como um fluxograma que utiliza blocos para representar entidades - cada uma com seus atributos específicos - e os relacionamentos entre elas. Embora visualmente semelhante a um diagrama de classes da UML, o DER tem aplicação distinta, sendo fundamental para o projeto de bancos de dados. Esta técnica foi formalizada por Peter Chen (1976) e permanece como padrão na engenharia de software até os dias atuais, tendo inclusive influenciado diretamente o desenvolvimento de outras notações de modelagem. Sua principal vantagem reside na capacidade de simplificar a organização dos dados em sistemas de qualquer escala, desde projetos curtos até sistemas complexos - nestes casos, utilizando variações como o DER estendido.

Os componentes básicos de um DER incluem entidades (que representam elementos do mundo real como "funcionário" ou "departamento"), atributos (como nome, CPF ou idade) e relacionamentos que conectam estas entidades. Conforme Pereira, Franck e Dantas Filho (2021), um diagrama eficiente deve mostrar como diferentes entidades se complementam, criando uma rede de informações interligadas. Os atributos podem ser classificados como simples ou compostos (como uma "identidade" formada por RG, CPF e nome), monovalorados ou multivalorados, e derivados ou armazenados (ELMASRI; NAVATHE, 2005). Os relacionamentos, representados por linhas entre as entidades, são qualificados por sua cardinalidade (1:1, 1:N ou N:M), que define quantitativamente como as entidades se associam.

Um aspecto crucial do DER é a distinção entre entidades fortes (com chave primária única) e fracas (que dependem de outras entidades para existir). As chaves primárias garantem a unicidade dos registros, enquanto as chaves estrangeiras, criadas através dos relacionamentos, mantêm a integridade referencial do banco de dados. Visualmente, o DER organiza-se em retângulos divididos: a parte superior contém o nome da entidade em negrito, enquanto a inferior lista seus atributos - iniciando pela chave primária, seguida dos demais atributos e finalizando com as chaves estrangeiras. As cardinalidades são indicadas nas extremidades das linhas de relacionamento. A Figura 20 deste trabalho apresenta o DER desenvolvido para o sistema, incorporando todos estes elementos de forma a representar fielmente a estrutura de dados necessária para atender aos requisitos do projeto.

---

>De acordo com Navathe e Elmasri (2005) podem existir diversos tipos de atributos em determinado diagrama: simples versus composto, monovalorado versus multivalorados, armazenado versus derivado. Os atributos compostos podem ser divididos em subclasses, como no caso de um atributo “Endereço”, que pode ser composto pelos atributos “Rua”, “Numero”, “Bairro” e “Cidade”, por exemplo.

funcionamento 
	O DER se diferencia do diagramas de classes graças a suas informações westarem atreladas diretamente ao banco de dados de um sistema, suas relações se orientam neste sentido, enquanto diagramas de classe se orientam ao objeto de desenvolvimento do *software*.
	Possui entidades, que são coisas que podem virar várias outras coisas. No entanto essas coisas tem vários atributos e esses atributos tem tipos e dentre esses tpios tem um que é mais especial que o outro, *primary key*. Entidades que não tem uma chavinha são chamadas de *entidades fracas*, a chavinha dela se determina através da relação que ela teria com outra entidade. Entidades se relacionam e os relacionamentos tem tipos 

Como aplicar

Descrição do gráfico

Gráfico desenvolvido pelo sistema

Conclusão do capítulo 4