@extends('site.layouts.basico_autenticado')

@section('titulo', 'Fornecedores')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Fornecedores - Cadastrar</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{route('site.cadastrar')}}">Novo</a></li> 
                <li><a href="{{route('app.fornecedores')}}">Voltar</a></li>
               
            </ul>
        </div>

        <div class="informacao-pagina">
           
                <div style="width: 30%; margin: 0 auto;">
                    <p>Preencha os campos abaixo para cadastrar um novo fornecedor.</p>
                    <form action="{{route('site.cadastrar')}}" method="post">
                        @csrf
                        <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{old('nome')}}">
                        <span class="erro_input"> {{$errors->has('nome') ? $errors->first('nome') : ''}}</span>
                        <input class="borda-preta" type="text" name="site" placeholder="Site" value="{{old('site')}}">
                        <span class="erro_input"> {{$errors->has('site') ? $errors->first('site') : ''}}</span>
                        <input class="borda-preta" type="text" name="uf" placeholder="UF" value="{{old('uf')}}">
                        <span class="erro_input"> {{$errors->has('uf') ? $errors->first('uf') : ''}}</span>
                        <input class="borda-preta" type="text" name="email" placeholder="E-mail" value="{{old('email')}}">
                        <span class="erro_input"> {{$errors->has('email') ? $errors->first('email') : ''}}</span>
                        <button class="borda-preta" type="submit">Cadastrar</button>
                       
                    </form>
                    <div>
                        @isset($erro)
                            <span style="color: red;">Fornecedor já cadastrado.</span>
                        @endisset
                        @isset($sucesso)
                            <span style="color: green;"> Fornecedor cadastrado com sucesso</span>
                            <form action="{{route('site.cadastrar')}}">
                                <button type="submit">Atualizar cadastro</button>
                            </form>
                            
                        @endisset
                    </div>
                </div>
                
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection