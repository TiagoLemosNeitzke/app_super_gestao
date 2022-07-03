@extends('site.layouts.basico_autenticado')

@section('titulo', 'Fornecedores')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Fornecedores - Atualizar</h1>
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
             
                <div style="width: 30%; margin: 0 auto;">
                    <p>Use os campos abaixo para editar os dados do fornecedor.</p>
                    @if(isset($fornecedor[0]))
                        <form action="{{route('site.atualizar')}}" method="post">
                            @csrf
                            <input class="borda-preta" type="text" readonly="readonly" name="id" placeholder="Nome" value="{{$fornecedor[0]['id']}}">
                            <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{$fornecedor[0]['nome']}}">
                            <input class="borda-preta" type="text" name="site" placeholder="Site" value="{{$fornecedor[0]['site']}}">
                            <input class="borda-preta" type="text" name="uf" placeholder="UF" value="{{$fornecedor[0]['uf']}}">
                            <input class="borda-preta" type="text" name="email" placeholder="E-mail" value="{{$fornecedor[0]['email']}}">
                            <button class="borda-preta" type="submit">Atualizar</button>
                        </form>
                    @endif
                    @isset($sucesso)
                    <span style="color: green;">Registro atualizado com sucesso.</span>
                    @endisset
                </div>
            
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection