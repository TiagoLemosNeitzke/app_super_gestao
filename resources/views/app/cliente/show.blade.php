@extends('site.layouts.basico_autenticado')

@section('titulo', 'Clientes')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Clientes - Visualizar</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>

            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin: 0 auto;">
                <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $cliente->nome }}</td>
                    </tr>
                </table>


            </div>

        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
