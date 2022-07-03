@extends('site.layouts.basico_autenticado')

@section('titulo', 'Fornecedores')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Fornecedores</h1>
        </div>

        <div class="informacao-pagina">

            <p>Cadastre novos fornecedores ou pesquise por fornecedores cadastrados.</p>
            <div style="width: 30%; margin: 0 auto;">

                <button type="submit"><a class="link" href="{{ route('site.cadastrar') }}">Cadastrar</a></button>

                <button type="submit"><a class="link" href="{{ route('site.consultar') }}">Pesquisar</a></button>

            </div>
        </div>
        @isset($msg)
            @if ($msg == 1)
                <div class="sucesso">Registro atualizado com sucesso</div>
            @endif
            @if ($msg == 2)
                <div class="sucesso">Registro apagado com sucesso</div>
            @endif
        @endisset
    </div>

    @include('site.layouts._partials.rodape')
@endsection
