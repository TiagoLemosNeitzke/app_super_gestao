@extends('site.layouts.basico_autenticado')

@section('titulo', 'Produtos')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Produtos - Visualizar</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>

            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin: 0 auto;">
                <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>{{ $produto->peso }} Kg</td>
                    </tr>
                    <tr>
                        <td>Unidade</td>
                        <td>{{ $produto->unidade_id }}</td>
                    </tr>
                    <tr>
                        <td>Comprimento</td>
                        <td>{{ $produto->comprimento }}</td>
                    </tr>
                    <tr>
                        <td>Largura</td>
                        <td>{{ $produto->largura }}</td>
                    </tr>
                    <tr>
                        <td>Altura</td>
                        <td>{{ $produto->altura }}</td>
                    </tr>
                </table>


            </div>

        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
