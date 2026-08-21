---
tags:
  - Estagio
  - Faculdade
---
# Docker

Função de dar deploy em aplicações, **um serviço de virtualização**, independente do ambiente em que se desenvolve (o que isso implica, não sei). O Docker é um container independente, ele constrói apenas o necessário, cada *container* é independente.
- O Container é quase que um sistema operacional do hospedeiro ==zerado==. Eles não tem visão de outros containers, sem sua própria rede e variáveis de rede. 
	- Se uma aplicação roda em um docker, ela não vai sofrer de problemas de "no meu PC roda", porque ele é algo facilmente 'transferível.'
- *Docker-Files*: possui todas as 'imagens' para rodar um ambiente. 
	- Elas ficam armazenadas para ser utilizada por um time.
- [[Dockerfile]]