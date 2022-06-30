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
                    <h3>Faça login no sistema com seu e-mail:</h3>
                    <input class="borda-preta" type="text" name="usuario" placeholder="Usuário" value="{{old('usuario')}}">
                    <span class="erro_input"> {{$errors->has('usuario') ? $errors->first('usuario') : ''}}</span>
                    <input type="password" name="senha" placeholder="Senha" class="borda-preta" value="{{old('senha')}}">
                    <span class="erro_input"> {{$errors->has('senha') ? $errors->first('senha') : ''}}</span>                    
                    <button type="submit" class="borda-preta">Entrar</button>
                </form>
                <span style="color: red;"> {{isset($erro) && $erro != '' ? $erro : '' }}</span>
                
            </div>
            
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection
