---
#Escola 
#AulaTécnica 

---

- **digitalRead**: Ele serve para ler o estado de uma entrada digital em um pino específico do micro-controlador. ``Essas entradas possuem apenas dois estados: HIGH(1) ou LOW(0).

- **analogRead:** Ele serve para ler valores da tensão analógica de um pino. Vários micro-controladores Arduino possuem pinos que podem ser lidos através de sensores de luminosidade e também botões (com o estado ligado e desligado 1 e 0).

###### Código com analogRead
```
int saidasLed[] = {2, 3, 4, 5, 6};
int btn = 7;

void setup(){
	pinMode(btn, INPUT);
  	Serial.begin(9600);
}

void loop(){
	int leitura = digitalRead (btn);
  Serial.println(leitura);
}
```