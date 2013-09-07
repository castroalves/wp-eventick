WP Eventick
======================

Adicione seus eventos do Eventick no WordPress.

## Como Usar
1. Copie a pasta `wp-eventick` para a pasta `plugins`
2. No Painel Administrativo do WordPress, acesse Plugins e ative o plugin WP Eventick
3. Acesse 'Configurações > Eventick' e informe seus dados de acesso ao Eventick

## Como Adicionar o Shortcode
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

Para maiores informações, leia o [http://developer.eventick.com.br/integracao](Guia de Integração do Eventick).
