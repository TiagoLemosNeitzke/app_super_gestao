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
                @if(isset($produtos[0]) && $produtos[0] != '')
                    <li><a href="">Voltar</a></li>
                @else
                    <li><a href="">Voltar</a></li>
                @endif
            </ul>
        </div>

        <div class="informacao-pagina">
            {{$produtos}}
            @if(isset($produtos[0]) && $produtos[0] != '')
                <div style="width: 90%; margin: 0 auto;">
                    <p>Dados do fornecedor:</p>

                    <table style="border:1px solid; width: 100%; marigin: 0 auto;">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
{{--                                <td>{{$produto->id}}</td>--}}
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <td><button><a class="link" href="">Atualizar</a></button></td>
                                <td><button><a class="link" href="">Excluir</a></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                   {{--  {{$produtos->appends($request['nome'])->links()}} --}}
                </div>

            @else
                <div style="width: 30%; margin: 0 auto;">
                    <p>Preencha um ou mais campos abaixo para realizar a pesquisa.</p>
                    <form action="" method="post">
                        @csrf
                        <input class="borda-preta" type="text" name="nome" placeholder="Nome">
                        <input class="borda-preta" type="text" name="descricao" placeholder="Descrição">
                        <input class="borda-preta" type="text" name="peso" placeholder="Peso">
                        <input class="borda-preta" type="text" name="unidade_id" placeholder="Unidade ID">
                        <button class="borda-preta" type="submit">Pesquisar</button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
