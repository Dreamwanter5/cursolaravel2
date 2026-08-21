---
tags:
  - Estagio
  - Laravel
---
2026-06-12 - 10:05

Tags: [[Laravel]], [[Estágio]]

# Reunião do dia 12.06.26

- Atualizar forks, ligar notificações das main branchs

## copaco

Sistema de equipamentos e redes, EquipamentoCrudTeste, RedeCrudTeste

 - Gerenciamento de equipamentos
 - Corrigir arquivos .env
 - implementar senha-unica faker
 - Fazer um teste dusk para cadastro de rede e equipamento
 - Gerar um arquivo **Kea** DHCPD baseado no arquivo já existente. `DhcpController.php` -> `KeaController.php`

> Enviar um pull request de cada tópico, Dusk e Kea. Facilita a análise do pull request.
---

**Se houver**, remover uma linha do compose que diz "chrome:driver --detect"


15.06.26 - 7:41

**Configuração para usar o senhaunica-fake**
```
APP_URL=http://localhost:8000
SENHAUNICA_KEY=faker
SENHAUNICA_SECRET=faker
SENHAUNICA_CALLBACK_ID=1
SENHAUNICA_ADMINS=111111
SENHAUNICA_DEV="http://auth.local:3141/wsusuario/oauth"
```

Ajuda também: 
SENHAUNICA_CODIGO_UNIDADE=8

==Para executar separadamente==
docker exec -it copaco php artisan dusk tests/Browser/teste