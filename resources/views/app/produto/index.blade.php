@extends('site.layouts.basico_autenticado')

@section('titulo', 'Produtos')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Produtos - Consultar</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                
            </ul>
        </div>

        <div class="informacao-pagina">
            
            @if(isset($produtos[0]) && $produtos[0] != '')
                <div style="width: 90%; margin: 0 auto;">
                    <p>Dados dos produtos:</p>

                    <table style="border:1px solid; width: 100%; marigin: 0 auto;">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Fornecedor ID</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <td>{{$produto->fornecedor->nome}}</td>
                                <td>{{$produto->comprimento ?? ''}}</td>
                                <td>{{$produto->altura ?? ''}}</td>
                                <td>{{$produto->largura ?? ''}}</td>
                                <td><button><a class="link" href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></button></td>
                                <td><button><a class="link" href="{{route('produto.edit', ['produto' => $produto->id])}}">Atualizar</a></button></td>
                                <td>
                                    <form action="{{route('produto.destroy', ['produto' => $produto->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12">
                                    <p>Pedido(s)</p>
                                    @foreach($produto->pedidos as $pedido)
                                    <a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">Pedido: {{$pedido->id}},</a>
                                   
                                    @endforeach
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{$produtos->appends($request)->links()}}
                </div>
            @endif
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
