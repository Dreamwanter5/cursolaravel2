---
tags:
  - Livros
---
# 📚 Biblioteca Pessoal

Quantos livros li a cada ano
## 📊 Estatísticas Anuais
```dataview
TABLE WITHOUT ID
	ano AS "Ano",
	length(rows) AS "Total",
	join(rows.file.link, " | ") AS "Livros"
FROM "Pessoal/Biblioteca/Livros"
WHERE Status = "Lido" AND fim
GROUP BY dateformat(date(fim), "yyyy") as ano
SORT dateformat(date(fim), "yyyy") DESC
```
---
Visualização geral dos livros e datas de finalização

## 📖 Todos os Livros Lidos

```dataview
TABLE WITHOUT ID
	"**" + dateformat(date(fim), "yyyy") + "**" AS "Ano",
	file.link AS "📚 Livro",
	Autor AS "✍️ Autor",
	dateformat(date(fim), "dd/MM/yyyy") AS "📅 Finalizado",
	Nota AS "⭐ Nota"
FROM "Pessoal/Biblioteca/Livros"
WHERE Status = "Lido" AND fim
SORT fim DESC
```

---

[[Repositório de Livros.base]]
[[A Hora da Estrela]]
[[Breves Respostas para Grandes Questões]]
[[Cidade de Deus]]
[[Dracula]]
[[Laços de Família - Clarice Lispector]]
[[Memórias Póstumas de Brás Cubas]]
[[O Ateneu]]
[[O fantasma de Canterville e outras histórias - Oscar Wilde]]
[[Onze Minutos]]
[[Passageiro para FrankFurt]]
[[Robô Selvagem]]
[[Sobre como lidar consigo mesmo (2022)]]
[[O Mundo de Sofia (2012)]]
