---
tags:
  - Pessoal
  - Main
cssclasses:
  - dashboard
banner: "![[pixelartceu.jpg]]"
banner_y: 0.45335
banner_x: 0.53375
---
# Ponto inicial para todos os locais importantes do meu Obsidian! 📚

 >[!principal]+ ## Acadêmico 
 >##### ``Experiências de Estudo``
 >### **[[Faculdade]]**
 >### [[Estágio]]
> ##### [[Ensino Médio - IFPR]] e [[Cursinho]]


>[!warning]+ ## [[Projetos]]
>##### ``Projetos pessoais``
> - [[Zettelkasten]]
> - [[Projetos| Projeto de Férias]]
  
>[!info]+ ## Hobbies
>##### ``Coisas que consumo para meu entretenimento ou edificação.``
>- #### [[Visualização de Filmes e Séries.base]]
>  
>- #### [[Visualização de Animes e Mangas.base]]
>  
>- #### [[Biblioteca de Jogos.base]]
>  
>- #### [[Repositório de Livros.base]]
>- #### [[Audioteca.base]]

  
>[!tip]+ ## Pessoal
> #### ``Para anotações pessoais, reflexões, objetivos, etc.``
>- [[Diário]]
>- [[Goals]]
>- [[RPG]]
>- [[Kathársis]]



> [!danger]+ # Informações
> - 🗄️ Anotações alteradas recentemente
 `$=dv.list(dv.pages('').sort(f=>f.file.mtime.ts,"desc").limit(6).file.link)`
> - 🔖 Tag:  importante 
 `$=dv.list(dv.pages('#tarefas').sort(f=>f.file.name,"desc").limit(4).file.link)`
> - 〽️ Estatística
>	-  Total de arquivos: `$=dv.pages().length`

---

> [!info] # Área nerd 🤓
> [[Jogos]]
> [[Filmes]]
> [[Animes & Mangas]]
> [[Livros]]

# 📊 Estatísticas de Mídia

## 📚 [[Repositório de Livros.base|Livros]]
```dataview
TABLE WITHOUT ID
	ano AS "Ano",
	length(rows) AS "Total",
	join(rows.file.link, " | ") AS "Livros"
FROM "Pessoal/Biblioteca/Livros"
WHERE Status = "Lido" AND fim
GROUP BY dateformat(date(fim), "yyyy") AS ano
SORT ano DESC
```

## 🎬 [[Visualização de Filmes e Séries.base|Filmes]]
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

## 🎮 [[Biblioteca de Jogos.base|Jogos]]
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

## 🎬 [[Visualização de Animes e Mangas.base|Animes]]
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

## 📚 [[Visualização de Animes e Mangas.base|Mangás]]
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

## 📈 Resumo Geral
```dataviewjs
// Função para contar itens por categoria
const categorias = [
	{ nome: "📚 Livros", caminho: '"Pessoal/Biblioteca/Livros"', condicao: 'Status = "Lido" AND fim' },
	{ nome: "🎬 Filmes", caminho: '"Pessoal/Audiovisual/Filmes"', condicao: 'watched = true AND lastWatched' },
	{ nome: "🎮 Jogos", caminho: '"Pessoal/Audiovisual/Jogos"', condicao: 'played = true AND finishedDate' },
	{ nome: "🎬 Animes", caminho: '"Pessoal/Audiovisual/Animes"', condicao: 'watched = true AND lastWatched' },
	{ nome: "📚 Mangás", caminho: '"Pessoal/Audiovisual/Mangas"', condicao: 'watched = true AND lastWatched' }
];

let totalGeral = 0;
const tabelaResumo = [];

for (const categoria of categorias) {
	const itens = dv.pages(categoria.caminho).where(p => {
		if (categoria.nome.includes("Livros")) return p.Status === "Lido" && p.fim;
		if (categoria.nome.includes("Filmes")) return p.watched === true && p.lastWatched;
		if (categoria.nome.includes("Jogos")) return p.played === true && p.finishedDate;
		if (categoria.nome.includes("Animes") || categoria.nome.includes("Mangás")) {
			return p.watched === true && p.lastWatched;
		}
		return false;
	});
	
	const total = itens.length;
	totalGeral += total;
	
	tabelaResumo.push([categoria.nome, total]);
}

// Adiciona linha do total geral
tabelaResumo.push(["**📊 TOTAL GERAL**", `**${totalGeral}**`]);

dv.table(["Categoria", "Total"], tabelaResumo);
```