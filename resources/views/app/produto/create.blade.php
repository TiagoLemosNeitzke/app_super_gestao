@extends('site.layouts.basico_autenticado')

@section('titulo', 'Produtos')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Produtos - Cadastrar</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li> 
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
               
            </ul>
        </div>

        <div class="informacao-pagina">
           
                <div style="width: 30%; margin: 0 auto;">
                    <p>Preencha os campos abaixo para cadastrar um novo produto.</p>
                    <form action="{{route('produto.store')}}" method="post">
                        @csrf
                        <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{old('nome')}}">
                        <span class="erro"> {{$errors->has('nome') ? $errors->first('nome') : ''}}</span>

                        <input class="borda-preta" type="text" name="descricao" placeholder="Descricao" value="{{old('descricao')}}">
                        <span class="erro"> {{$errors->has('descricao') ? $errors->first('descricao') : ''}}</span>

                        <input class="borda-preta" type="text" name="peso" placeholder="Peso" value="{{old('peso')}}">
                        <span class="erro"> {{$errors->has('peso') ? $errors->first('peso') : ''}}</span>

                        <select name="unidade_id">
                            <option value="">Selecione a unidade da empresa</option>
                            @foreach($unidades as $unidade)
                            <option value="{{$unidade->id}}" {{old('unidade_id' == $unidade->id ? 'selected' : '')}}>{{$unidade->descricao}}</option>
                            @endforeach
                            
                        </select>
                        <span class="erro"> {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}</span>
                        
                        <button class="borda-preta" type="submit">Cadastrar</button>
                       
                    </form>
                    <div>
                        @isset($erro)
                            <span class="erro">Produto já cadastrado.</span>
                        @endisset
                        @isset($sucesso)
                            <span class="sucesso"> Produto cadastrado com sucesso</span>                            
                        @endisset
                    </div>
                </div>
                
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection