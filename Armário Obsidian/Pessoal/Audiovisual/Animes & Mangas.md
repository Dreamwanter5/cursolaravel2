---
tags:
  - mediaDB/manga
  - mediaDB/tv/series
  - notShow
---

# 📺 Animes & Mangás

## 📚 Mangás
### Estatísticas Anuais
```dataview
TABLE WITHOUT ID
	ano AS "Ano",
	length(rows) AS "Total",
	join(rows.file.link, " | ") AS "Mangás"
FROM "Pessoal/Audiovisual/Mangas"
WHERE watched = true AND lastWatched
GROUP BY dateformat(date(lastWatched), "yyyy") AS ano
SORT ano DESC
```

### Todos os Mangás
```dataview
TABLE WITHOUT ID
	"**" + dateformat(date(lastWatched), "yyyy") + "**" AS "Ano",
	 file.link AS "📚 Mangá",
	authors[0] AS "✍️ Autor",
	dateformat(date(lastWatched), "dd/MM/yyyy") AS "📅 Finalizado em",
	personalRating AS "⭐ Nota"
FROM "Pessoal/Audiovisual/Mangas"
WHERE watched = true AND lastWatched
SORT lastWatched DESC
```

## 🎬 Animes
### Estatísticas Anuais
```dataview
TABLE WITHOUT ID
	ano AS "Ano",
	length(rows) AS "Total",
	join(rows.file.link, " | ") AS "Animes"
FROM "Pessoal/Audiovisual/Animes"
WHERE watched = true AND lastWatched
GROUP BY dateformat(date(lastWatched), "yyyy") AS ano
SORT ano DESC
```

### Todos os Animes
```dataview
TABLE WITHOUT ID
	"**" + dateformat(date(lastWatched), "yyyy") + "**" AS "Ano",
	file.link AS "🎬 Anime",
	writer[0] AS "✍️ Roteirista",
	dateformat(date(lastWatched), "dd/MM/yyyy") AS "📅 Assistido em",
	personalRating AS "⭐ Nota"
FROM "Pessoal/Audiovisual/Animes"
WHERE watched = true AND lastWatched
SORT lastWatched DESC
```


---
Apenas para ligar as anotações de animes e mangas em [[Visualização de Animes e Mangas.base]]
[[Blue Period (2021)]]
[[Castlevania (2017–2021)]]
[[Castlevania - Nocturne (2023–)]]
[[Scott Pilgrim Takes Off (2023)]]
[[To Be Hero X (2025]]
[[Tokyo Ghoul (2013)]]
[[Tokyo Ghoul -re (2014)]]