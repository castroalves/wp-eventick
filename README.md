WP Eventick
======================

Adicione seus eventos do Eventick no WordPress.

## Como Usar
1. Copie a pasta `wp-eventick` para a pasta `plugins`
2. No Painel Administrativo do WordPress, acesse Plugins e ative o plugin WP Eventick
3. Acesse 'Configurações > Eventick' e informe seus dados de acesso ao Eventick

## Como Listar os Eventos
Na página de edição de posts ou páginas, adicione o código a seguir:

	[eventick_list]

## Configurações disponíveis

* **venue_before:** Código HTML que será exibido antes do local do evento.
* **venue_after:** Código HTML que será exibido após o local do evento. Padrão: `<br />`.
* **date_before:** Código HTML que será exibido antes da data do evento.
* **date_after:** Código HTML que será exibido após a data do evento. Padrão: `<br />`.
* **button_label:** Texto que será exibido no botão de inscrição. Padrão: `Inscreva-se Já!`.
* **button_class:** Classe(s) CSS do botão de inscrição.
* **button_target:** Destino do link. Padrão: `_blank` (abrir em uma nova janela).
* **order:** Ordem de exibição dos eventos de acordo com a data. Padrão: `ASC` (data crescente).

## Como Disponibilizar Inscrições
Na página de edição de posts ou páginas, adicione o código a seguir:

    [eventick url="http://eventick.com.br/seu-evento"]

Substitua `seu-evento` pelo slug que o Eventick gerou para seu evento.

## Adicionando o botão de inscrição

	[eventick url="http://eventick.com.br/seu-evento" type="button"]

## Adicionando o box de venda de ingressos

	[eventick url="http://eventick.com.br/seu-evento" type="tickets"]

## Configurações disponíveis

### Gerais

- **url:** URL de seu evento. Este atributo é **obrigatório**.
- **type:** tipo de integração. Valor padrão: `tickets`.
    - **button:** botão de venda
    - **tickets:** box de venda de ingressos

### Box de Venda de Ingressos

- **width:** largura do box
- **height:** altura do box

### Botão

- **size:** tamanho do botão. Valor padrão: `m`.
    - **p:** pequeno
    - **m:** médio
    - **g:** grande

Exemplo:

    [eventick url="http://eventick.com.br/seu-evento" type="type" size="p"]

- **label:** título do botão. Valor padrão: `vaga`.
    - **vaga:** Exibe a mensagem *"Garanta sua vaga"*.
    - **ingresso:** Exibe a mensagem *"Compre seu ingresso"*
    - **inscreva:** Exibe a mensagem *"Inscreva-se já"*

Exemplo:

    [eventick url="http://eventick.com.br/seu-evento" type="type" label="vaga "]

### Mais Informações

Leia o [Guia de Integração do Eventick](http://developer.eventick.com.br/integracao).

### Dúvidas, sugestões ou bugs? Fale Comigo.

Twitter: [@castroalves](http://twitter.com/castroalves)<br />
Facebook: http://facebook.com/cadudecastroalves
