
@component('mail::message')

#Olá Sr(a) Cliente


<p>Seja Bem-vindo a nossa empresa, agradecemos pela sua preferência !</p>
<p>O numero do seu pedido é #{{$pedido->ID}}, caso tenha alguma duvida, entre em contato conosco.</p>

@component('mail::table')
| PRODUTO 	| VALOR 	| QUANTIDADE 	|
| :---------	| :-------	| :------------	|
@foreach ($PRODUTOS as $prod)
| {{$prod->NOME}}   | R$ {{$prod->VALOR}}   | {{$prod->QUANTIDADE}} {{$prod->MEDIDA}}  |
@endforeach
@endcomponent


<p>Valor Total : R$ {{$pedido->VALOR_TOTAL}}</p>
<p>Metodo de Pagamento : {{$pedido->METODO_PAGAMENTO}}</p>
Obrigado,<br>
Tenha um otimo dia...<br>

@endcomponent
