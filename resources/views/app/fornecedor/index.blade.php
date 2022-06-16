<h3> Fornecedor (view) </h3>

Para fazer comentários na view veja no código:

{{-- Este é um comentário --}}
<br>
{{ 'Assim posso imprimir as coisa na tela' }}
<br>
<?= 'Assim também imprime' ?>

<br>
Incluindo blocos de php puro:
<br>

@php 
echo 'Este é um bloco de php puro';
// aqui os comentários são igual ao do php
@endphp

{{-- com o dd posso imprimir algo para debug @dd($fornecedores)--}}
@isset($fornecedores[0])
    <h3>Indice não definido.</h3>
@endisset
@if(count($fornecedores) > 0 && count($fornecedores) < 4)
    <h3> Existem Fornecedores cadastrados </h3>
@elseif(count($fornecedores) >= 5)
    <h3> Existem mais de 5 Fornecedores cadastrados </h3>
@else
    <h3> Não existem Fornecedores cadastrados </h3>
@endif
{{-- 
O teste abaixo verifica se:
$variavel testada não esta definida
            ou
$variavel testada possui valor null
Evitando assim estourar erro
 --}}
@isset($fornecedores)
<br> <b> Impressão realizada pelo for </b> <br>
    @for($indice = 0; isset($fornecedores[$indice]); $indice++)
    
    Nome: {{ $fornecedores[$indice]['nome'] ?? 'Não informado'}} 
    <br>
    CNPJ: {{$fornecedores[$indice]['cnpj'] ?? 'Não informado'}}
    <br>
    Endereço: {{$fornecedores[$indice]['endereco'] ?? 'Dado não informado'}}
    <br>
    Telefone: : ({{$fornecedores[$indice]['ddd'] ?? 'Não informado'}}) {{$fornecedores[$indice]['telefone'] ?? 'Não informado'}}
    <hr>
    @endfor 
    <br>
    
@endisset

@isset($fornecedores)
    <b> Impressão realizada pelo switch </b> <br>
    Nome: {{ $fornecedores[1]['nome'] ?? 'Não informado'}} 
    CNPJ: {{$fornecedores[1]['cnpj'] ?? 'Não informado'}}
    <br>
    Endereço: {{$fornecedores[1]['endereco'] ?? 'Dado não informado'}}
    <br>
    Telefone: : ({{$fornecedores[1]['ddd'] ?? 'Não informado'}}) {{$fornecedores[1]['telefone'] ?? 'Não informado'}}
    
    @switch($fornecedores[1]['ddd'])
    
        @case('67')
            Mato Grosso do Sul
            @break
        @case('46')
            Paraná
            @break
        @case('11')
            São Paulo
            @break
        @default
            'DDD não informado'
    @endswitch
    <hr>
@endisset

@isset($fornecedores)
    <b> Impressão realizada pelo forelse </b> <br>
    @forelse($fornecedores as $indice => $fornecedor)
    Iteração atual do laço: {{ $loop->iteration}} <br> {{-- funciona só no foreach e no forelse --}}
    
    Nome: {{ $fornecedor['nome'] ?? 'Não informado'}} 
    <br>
    CNPJ: {{$fornecedor['cnpj'] ?? 'Não informado'}}
    <br>
    Endereço: {{$fornecedor['endereco'] ?? 'Dado não informado'}}
    <br>
    Telefone: : ({{$fornecedor['ddd'] ?? 'Não informado'}}) {{$fornecedor['telefone'] ?? 'Não informado'}} <br>
    @if($loop->first)
       <b> Primeira iteração do loop </b>
    @endif 

    @if($loop->last)
       <b> Última iteração do loop </b>
       <br>
       Total de registros: {{$loop->count}}
    @endif

    <hr>
    @empty
        Sem forncedores cadastrados
    @endforelse 
@endisset
{{-- @unless serve para inverter o resultado de uma comparação --}}

{{-- @empty verifica se uma var ou array está vazio | o php considera vazio se os valores forem: --}}
                        {{-- '' | string vazia--}}
                        {{-- 0 | zero--}}
                        {{-- 0.0 | valor flutuante de zero--}}
                        {{-- '0' |string zero--}}
                        {{-- null --}}
                        {{-- false --}}
                        {{-- array() | array vazio--}}
                        {{-- $var | variável só declarada sem atribuição de valor--}}
@empty($forncedores[1])
    <h3>Indice vazio</h3>
@endempty