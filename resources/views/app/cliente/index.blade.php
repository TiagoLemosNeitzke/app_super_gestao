@extends('site.layouts.basico_autenticado')

@section('titulo', 'Cliente')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Listagem de clientes</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 90%; margin: 0 auto;">
                <p>Dados dos clientes:</p>

                <table style="border:1px solid; width: 100%; marigin: 0 auto;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td><button><a class="link"
                                            href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></button>
                                </td>
                                <td><button><a class="link"
                                            href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Atualizar</a></button>
                                </td>
                                <td>
                                    <form action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $clientes->appends($request)->links() }}
            </div>

        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
