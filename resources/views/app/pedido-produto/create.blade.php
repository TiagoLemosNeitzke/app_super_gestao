@extends('site.layouts.basico_autenticado')

@section('titulo', 'Pedido Produto')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">

            <h1>Adicionar Produtos ao Pedido</h1>


        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                {{-- <li><a href="{{route('pedido.index')}}">Voltar</a></li> --}}

            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>ID Cliente: {{ $pedido->cliente_id }}</p>

            <div style="width: 80%; margin: 0 auto;">
                <h4>Itens do pedido</h4>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID do produto</th>
                            <th>Nome do produto</th>
                            <th>Descrição do produto</th>
                            <th>Fornecedor do produto</th>
                            <th>Peso do produto</th>
                            <th>Comprimento do produto</th>
                            <th>Altura do produto</th>
                            <th>Largura do produto</th>
                            <th>Data de inclusão do item ao pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            {{-- {{$produto}} --}}
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->comprimento }}</td>
                                <td>{{ $produto->largura }}</td>
                                <td>{{ $produto->altura }}</td>
                                <td>{{ $produto->pivot->created_at->format('d/m/y') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @component('app.pedido-produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent

            </div>

        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
