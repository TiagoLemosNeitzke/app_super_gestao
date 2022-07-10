@extends('site.layouts.basico_autenticado')

@section('titulo', 'Editar')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Produtos - Editar</h1>
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li> 
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
               
            </ul>
        </div>

        <div class="informacao-pagina">
           
                <div style="width: 30%; margin: 0 auto;">
                    <p>Faça a edição do produto nos campos abaixo.</p>
                    <form action="{{route('produto.update', ['produto' => $produto->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{$produto->nome ?? old('nome')}}">
                        <span class="erro"> {{$errors->has('nome') ? $errors->first('nome') : ''}}</span>

                        <input class="borda-preta" type="text" name="descricao" placeholder="Descricao" value="{{$produto->descricao ?? old('descricao')}}">
                        <span class="erro"> {{$errors->has('descricao') ? $errors->first('descricao') : ''}}</span>

                        <input class="borda-preta" type="text" name="peso" placeholder="Peso" value="{{$produto->peso ?? old('peso')}}">
                        <span class="erro"> {{$errors->has('peso') ? $errors->first('peso') : ''}}</span>

                        <select name="unidade_id">
                            <option value="">Selecione a unidade da empresa</option>
                            @foreach($unidades as $unidade)
                            <option value="{{$unidade->id}}" {{($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{$unidade->descricao}}</option>
                            @endforeach
                            
                        </select>
                        <span class="erro"> {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}</span>
                        
                        <button class="borda-preta" type="submit">Atualizar</button>
                       
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