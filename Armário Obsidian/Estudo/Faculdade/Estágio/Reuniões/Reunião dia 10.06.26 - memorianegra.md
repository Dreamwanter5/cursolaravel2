---
tags:
  - Estagio
---
2026-06-10 - 10:04

Tags: [[Estágio]]

# Reunião dia 10.06.26

Aproximar o sistema do Dedalus com o sistema de partituras ECA.

**To-do**
- Ao receber os resultados dentro do sistema, fazer um loop para a criação de arquivos `opac`. 
- Montar um código análogo a um `count` para atribuir a $Hits$ para contar como número int os resultados recebidos.

  

 `Como testar na unha:`

 `sudo apt install yaz`
 `yaz-client dedalus.usp.br:9991`
 `base USP01`
 `find @and @attr 1=21 PRECONCEITO @attr 1=21 RACIAL`

**Tasks:**
1 - salvar todos registros, não apenas os primeiros 10. A quantidade de registro é retornada como Number of hits: 330, nesse caso 330.

2 - PRECONCEITO RACIAL deve ser uma variável, pois vou fazer a busca para vários termos, que pode ter um ou mais palavras, exemplo: arte negra, relações étnicos raciais, etc, que ficaria então: find @and @attr 1=21 relações @attr 1=21 étnicos @attr 1=21 raciais

3 - salvar 4 tipos de arquivos marc, xml, SUTRS e opac para cada registro.

4 - para nomear os arquivos, usar o campo identifider do xml: <identifier>8585775092</identifier>, então ficaria 8585775092.xml, 8585775092.opac etc

5 - Montar lista de HITS de forma dinâmica

---
**Questões:**
Nem todos os documentos possuem identifier

```
chmod +x download.sh
./download.sh preconceito racial
```

```
while read -r termo; do
    ./download.sh "$termo"
done < termos.txt
```


[[Reunião dia 25.06.26 - Reunião memoria negra]]
