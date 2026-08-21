---
#Escola 
#AulaTécnica 
---
##### Aula 4 dia 08/03/2024

```
int contador = 0;

void setup() {
  Serial.begin(9600); 
}


void loop()
{
  Serial.println(contador);
  contador = contador+1;
  delay (1000); 
}
```

> Esse seria um exemplo de código que começa um contador serial, algo que se adequa ao teste prático de sistemas em Arduino. Ele também é muito importante para realizar 
> **Leitura de Dados**
> **Envio de Dados**
> **Depuração**
> **Interação Externa**.

[[Códigos Arduino]]