@extends('site.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <input class="borda-preta" type="text" name="usuario" placeholder="Usuário">
                    <input type="paswword" name="senha" placeholder="Senha" class="borda-preta">
                    <button type="submit" class="borda-preta">Entrar</button>
                </form>
            </div>
            
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
