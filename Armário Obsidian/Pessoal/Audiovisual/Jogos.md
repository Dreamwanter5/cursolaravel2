---
tags:
  - mediaDB/game
---
# :LiGamepad: Biblioteca de jogos

## Estatísticas anuais
O quão nerd você foi?
```dataview
TABLE WITHOUT ID
	ano AS "Ano",
	length(rows) AS "Total",
	join(rows.file.link, " | ") AS "Jogos"
FROM "Pessoal/Audiovisual/Jogos"
WHERE played = true AND finishedDate
GROUP BY dateformat(date(finishedDate), "yyyy") AS ano
SORT ano DESC
```
---
## Dados Gerais
Muitas das datas de finalização podem ser incongruentes justamente por eu não costumar anotar as datas na época de gameplya.

```dataview
TABLE WITHOUT ID
	"**" + dateformat(date(finishedDate), "yyyy") + "**" AS "Ano",
	file.link AS "🎮 Jogo",
	developers[0] AS "🏢 Desenvolvedora",
	dateformat(date(finishedDate), "dd/MM/yyyy") AS "📅 Finalizado em",
	personalRating AS "⭐ Nota"
FROM "Pessoal/Audiovisual/Jogos"
WHERE played = true AND finishedDate
SORT finishedDate DESC
```
---
[[Biblioteca de Jogos.base]]
Apenas uma visualização do que há no base's de jogos para ligar as anotações.

[[Baldur's Gate 3 (2023)]]
[[Clair Obscur - Expedition 33 (2025)]]
[[Hellblade - Senua's Sacrifice (2017)]]
[[Kingdom Come - Deliverance (2016)]]
[[Papers Please (2013)]]
[[Remember The Flowers]]
[[Warframe (2013)]]
[[In Finite Space]]