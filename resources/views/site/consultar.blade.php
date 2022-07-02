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
                @if(isset($fornecedor[0]) && $fornecedor[0] != '')
                <li><a href="{{route('site.consultar')}}">Voltar</a></li>
                @else
                <li><a href="{{route('app.fornecedores')}}">Voltar</a></li>
                @endif
            </ul>
        </div>

        <div class="informacao-pagina">
            @if(isset($fornecedor[0]) && $fornecedor[0] != '')
                <div style="width: 30%; margin: 0 auto;"">
                    <p>Dados do fornecedor:</p>  
                    <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{ isset($fornecedor[0]['nome']) ? $fornecedor[0]['nome'] : ''}}">
                    <input class="borda-preta" type="text" name="site" placeholder="Site" value="{{isset($fornecedor[0]['site']) ? $fornecedor[0]['site'] : ''}}">
                    <input class="borda-preta" type="text" name="uf" placeholder="UF" value="{{isset($fornecedor[0]['uf']) ? $fornecedor[0]['uf'] : ''}}">
                    <input class="borda-preta" type="text" name="email" placeholder="E-mail" value="{{isset($fornecedor[0]['email']) ? $fornecedor[0]['email'] : ''}}">
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