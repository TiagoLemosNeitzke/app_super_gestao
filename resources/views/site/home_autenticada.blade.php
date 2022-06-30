@extends('site.layouts.basico_autenticado')

@section('titulo', 'Home')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Home</h1>
        </div>

        <div class="informacao-pagina">
            <h3>Seja bem vindo ao App Super Gestão!</h3>
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
