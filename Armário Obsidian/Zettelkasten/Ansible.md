---
tags:
  - Zettelkasten
  - Estagio
---
## O que é o Ansible?
Ansible® é um mecanismo open source de automação. Ele ajuda a automatizar o [provisionamento](https://www.redhat.com/pt-br/topics/automation/what-is-provisioning), o [gerenciamento de configurações](https://www.redhat.com/pt-br/topics/automation/what-is-configuration-management), a [implantação de aplicações](https://www.redhat.com/pt-br/technologies/management/ansible/application-delivery), a [orquestração](https://www.redhat.com/pt-br/topics/automation/what-is-orchestration) e muitos outros processos de TI.

É possível usar o Ansible para instalar software, automatizar tarefas do dia a dia, provisionar componentes de infraestrutura e rede, melhorar a segurança e a conformidade, aplicar patches em sistemas e orquestrar fluxos de trabalho complexos.

O Red Hat® Ansible Automation Platform foi desenvolvido com os elementos fundamentais da versão comunitária do Ansible. No entanto, nossa solução oferece suporte empresarial por todo o ciclo de vida do software e inclui funcionalidades projetadas para auxiliar as empresas a padronizar, operacionalizar e escalar a automação. 

Neste artigo, explicamos os princípios básicos por trás do Ansible da comunidade e do Red Hat Ansible Automation Platform.

## Como o Ansible funciona?

**Módulos**

O Ansible se conecta aos nós (ou hosts) e envia a eles pequenos programas chamados módulos. Os nós são os endpoints de destino (servidores, dispositivos de rede ou qualquer computador) que você quer gerenciar com o Ansible. Os módulos são utilizados para realizar tarefas de automação no Ansible. Esses programas foram desenvolvidos para serem modelos de recursos do estado desejado do sistema. Em seguida, o Ansible executa os módulos e os remove ao terminar.

Sem eles, você dependeria de comandos ad hoc e scripts para realizar suas tarefas. Você pode usar os módulos integrados do Ansible para automatizar tarefas ou escrever os seus próprios módulos novos. Os módulos do Ansible podem ser escritos em qualquer linguagem que retorne JSON, como Ruby, Python ou bash. Os módulos de [automação do Windows](https://www.redhat.com/pt-br/technologies/management/ansible/automate-microsoft-windows-with-ansible) podem ser escritos até mesmo em Powershell. 

[Saiba mais sobre os módulos do Ansible e como eles funcionam](https://www.redhat.com/pt-br/topics/automation/what-is-an-ansible-module)