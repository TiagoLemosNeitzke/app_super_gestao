@extends('site.layouts.basico_autenticado')

@section('titulo', 'Pedidos')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Pedidos - Consultar</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{route('pedido.create')}}">Novo</a></li>
                
            </ul>
        </div>

        <div class="informacao-pagina">
            
            
                <div style="width: 90%; margin: 0 auto;">
                    <p>Dados do pedido:</p>

                    <table style="border:1px solid; width: 100%; marigin: 0 auto;">
                        <thead>
                        <tr>
                            <th>ID pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{$pedido->id}}</td>
                                <td>{{$pedido->cliente_id}}</td>
                                <td><button><a class="link" href="{{route('pedido.show', ['pedido' => $pedido->id])}}">Visualizar</a></button></td>
                                <td><button><a class="link" href="{{route('pedido.edit', ['pedido' => $pedido->id])}}">Atualizar</a></button></td>
                                <td><button><a class="link" href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">Adicionar produtos</a></button></td>
                                <td>
                                    <form action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{$pedidos->appends($request)->links()}}
                </div>
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection