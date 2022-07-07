@extends('site.layouts.basico_autenticado')

@section('titulo', 'Fornecedores')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Fornecedores - Consultar</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{route('site.cadastrar')}}">Novo</a></li>
                @if(isset($fornecedores[0]) && $fornecedores[0] != '')
                <li><a href="{{route('site.consultar')}}">Voltar</a></li>
                @else
                <li><a href="{{route('app.fornecedores')}}">Voltar</a></li>
                @endif
            </ul>
        </div>

        <div class="informacao-pagina">
            @if(isset($fornecedores[0]) && $fornecedores[0] != '')
                <div style="width: 90%; margin: 0 auto;">
                    <p>Dados do fornecedor:</p> 
                   
                        <table style="border:1px solid; width: 100%; marigin: 0 auto;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Site</th>
                                    <th>UF</th>
                                    <th>E-mail</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{$fornecedor->id}}</td>
                                    <td>{{$fornecedor->nome}}</td>
                                    <td>{{$fornecedor->site}}</td>
                                    <td>{{$fornecedor->uf}}</td>
                                    <td>{{$fornecedor->email}}</td>
                                    <td><button><a class="link" href="{{route('site.atualizar',['id' => $fornecedor->id] )}}">Atualizar</a></button></td>
                                    <td><button><a class="link" href="{{route('site.excluir', ['id' => $fornecedor->id])}}">Excluir</a></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$fornecedores->appends($request['uf'])->links()}}
                </div>
                
            @else
                <div style="width: 30%; margin: 0 auto;">
                    <p>Preencha um ou mais campos abaixo para realizar a pesquisa.</p>
                    <form action="{{route('site.consultar')}}" method="post">
                        @csrf
                        <input class="borda-preta" type="text" name="nome" placeholder="Nome">
                        <input class="borda-preta" type="text" name="site" placeholder="Site">
                        <input class="borda-preta" type="text" name="uf" placeholder="UF">
                        <input class="borda-preta" type="text" name="email" placeholder="E-mail">
                        <button class="borda-preta" type="submit">Pesquisar</button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection