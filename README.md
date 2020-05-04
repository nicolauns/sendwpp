# SendWpp - Gerador de links diretos para o Whatsapp

### Pra que serve ?

O SendWpp é uma ferramenta grátis para direcionar usuários diretamente para sua janela de chat do WhatsApp sem ter a necessidade de cadastrar o número na agenda do telefone, tornando mais rápido e prático o contato com você e/ou seu negócio. <br />

![Image 1](https://github.com/jco666/sendwpp/blob/master/readme_1.png) <br />

### Como usar a API

#### Endpoint:
```http://exemplo.com/```

#### Metodo:
```GET```

#### Formatos aceitos:

```http://exemplo.com/+55 (73) 9 9169-3096``` <br />
```http://exemplo.com/(73) 9 9169-3096``` <br />
```http://exemplo.com/+5573991693096``` <br />
```http://exemplo.com/73991693096``` <br />

###### NOTA: Minimo de 10 caracteres. Todos os caracteres diferentes de números serão ignorados. Caso não haja +55 no inicio, a API adicionara.

#### Resposta:

HTTP Status ```302```
