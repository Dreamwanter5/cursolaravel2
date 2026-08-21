---
tags:
  - mediaDB/tv/movie
---
# 🎞️ Cinema

O título é autoexplicativo :D

## :LiEye: Estatísticas anuais 

Só para saber.
```dataview
TABLE WITHOUT ID
	ano AS "Ano",
	length(rows) AS "Total",
	join(rows.file.link, " | ") AS "Filmes"
FROM "Pessoal/Audiovisual/Filmes"
WHERE watched = true AND lastWatched
GROUP BY dateformat(date(lastWatched), "yyyy") AS ano
SORT ano DESC
```
---
## :LiDatabase: Dados pontuais

Descrição detalhada dos filmes assistidos.

```dataview
TABLE WITHOUT ID
	"**" + dateformat(date(lastWatched), "yyyy") + "**" AS "Ano",
	file.link AS "🎬 Filme",
	director[0] AS "🎥 Diretor",
	dateformat(date(lastWatched), "dd/MM/yyyy") AS "📅 Assistido em",
	personalRating AS "⭐ Nota"
FROM "Pessoal/Audiovisual/Filmes"
WHERE watched = true AND lastWatched
SORT lastWatched DESC
```
---

Ligações :LiActivity:
[[Visualização de Filmes e Séries.base]]
[[Cidade de Deus (2002)]]
[[Breaking Fast (2020)]]
[[Dating Amber (2020)]]
[[Fellow Travelers (2023)]]
[[La La Land (2016)]]
[[Moonlight (2016)]]
[[Strange Way of Life (2023)]]
[[Notes of Autumn (2023)]]
[[zA Christmas to Treasure (2022)]]
[[Dashing in December (2020)]]
[[Pillion (2025)]]
[[Plainclothes (2025)]]