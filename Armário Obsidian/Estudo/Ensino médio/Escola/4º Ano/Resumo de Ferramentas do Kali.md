---
tags:
  - AulaTécnica
---
# Kali Linux

Kali Linux é uma das distribuições do Linux que se mostra como a ideal para testes de penetração nos mais diversos sistemas, seu uso é feito por seguranças da informação e hackers éticos (Hackers éticos seriam aqueles que verificam as brechas de um sistema não para benefício próprio, mas sim para poder alertar e corrigir estes erros.)

# Principais Ferramentas

O Kali Linux já tem uma separação pontual das ferramentas para as mais diversas necessidades. Elas se separam das seguintes formas:
**1. Coleta de Informações.**
Dentre essas se encontra o ***==Nmap==***, (que inclusive é a ferramenta que utilizei com meu grupo). Ele é mais utilizado dentro da função de encontrar e adquirir informações sobre uma rede/endereço para que você utilize outros aplicativos para explorar essas brechas. Através de seus comandos, fica possível visualizar quantas portas estão abertas e vulneráveis em um sistema. O nome formal dessas funções pode ser, coleta de alvos, varredura de portas...
<p> É válido citar a Maltego que faz a mesma função mas com uma interface gráfica</p>
**2. Análise de Vulnerabilidades.**
O Nmap também se encontra dentro desta categoria, visto sua complexidade e amplitude de funções disponíveis

**3. Análise de aplicações Web.**
***==Burpsuite==*** é a ferramenta central deste nicho de programas, o nome é bem intuitivo, ele faz os testes de penetração em sites, não redes em específico, pra sites em Wordpress também há o ==***wpsscan***==. 

**5. Ataques em senhas**
Como o nome sugere, os aplicativos que estão nessa área sugerem que suas ferramentas sejam dedicadas para o ataque de perfis e suas contas, isso funciona através de comandos que executam uma *wordlist*, que é basicamente um documento de texto robusto repleto de senhas que o sistema irá executar em um endereço de IP para tentar em força bruta, invadir aquela rede. O usuário também pode criar sua própria *wordlist*. Um dos aplicativos centrais desta região é o ***==Hydra==***.

**6. Ataque de Redes Wi-Fi**
Executa a mesma função que o programa anterior, porém, destinado a redes *wireless.* Enquanto o Hydra é mais dedicado ao ataque de perfis em sistemas de usuários. O aplicativo destaque dessa área é o ==***Aircrack.ng***==

**8. Exploração de Ferramentas**
Serve como uma opção que permite seu usuário desfrutar das possibilidades para invadir uma rede. ==***Metasploit***== é seu carro chefe.

**9. Sniffing e Snooping**
Sniffing e snooping é um termo utilizado para um sistema que tem enquanto funcionalidade, a possibilidade de capturar dados que estão trafegando em uma rede. Sua aplicação poderia se dar no caso de wi-fi's suspeitos que encontramos ao estar em ambientes públicos.

há também ferramentas de investigação forense(?) e em especial **Engenharia Social** com a **Maltego** que já se fez presente em outras seções. 
Engenharia Social é o termo utilizado para basicamente ==manipulação== de usuários. Fazendo com que eles exibam informações sensíveis ou confidenciais. Como eles fazem isso? *Phishing, Malware, Clicks errados...*

---

#### Ferramentas utilizadas na UC

**Grupo 1: Metaspolit**
Metasploit é uma ferramenta geral, ele identifica vulnerabilidades em redes, sistemas e também em aplicações. Ele esta categorizado como uma ferramenta de exploração dado que tem MUITOS códigos disponíveis para o usuário experimentar.

**Grupo 2: Gophish**
Gophish é uma ferramenta de engenharia social, ou seja, de manipulação de pessoas. Ele permite que o usuário faça o *phishing* como a funcionalidade principal de seu usuário.

**Grupo 3: Nmap**
Serve como um identificador de falhas em uma rede, ele é aquele que pode iniciar o processo de ataque de uma rede, ele identifica as falhas e vulnerabilidades. *Network Mapper* é o nome completo, ele identifica dispositivos conectados em uma rede e também quais são as portas que estão abertas e desprotegidas.

**Grupo 4: SQLMap**
Sql map é um sistema de penetração, ele é mais simplificado, feito com o propósito de automatizar e facilitar injeções por SQL, como, por exemplo, atacando bancos de dados de um servidor. Seu destaque se encontra pela sua ferramenta de detecção.

**Grupo 5: Medusa**
É especialmente um invasor de contas, ele faz uma invasão por força bruta em usuários usando de *wordlists.* É versátil e pode ser usado em diversas formas por seus usuários, se tornando mais potente conforme a capacidade do programador que o utiliza.

**Grupo 6: WireShark**
Feito para roubar e pegar dados que trafegam em uma mesma rede, dessa forma, o usuário pode roubar dados de alguém que acessa uma conta bancária dentro da mesma rede.