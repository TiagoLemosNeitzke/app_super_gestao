@extends('site.layouts.basico_autenticado')

@section('titulo', 'Detalhes do Produtos')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            
                <h1>Adicionar detalhes do produto</h1>
            
            
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{route('produto-detalhe.edit')}}">Editar</a></li> 
                <li><a href="{{route('produto-detalhe.create')}}">Novo</a></li> 
                <li><a href="{{route('produto-detalhe.index')}}">Voltar</a></li>
               
            </ul>
        </div>

        <div class="informacao-pagina">
           
                <div style="width: 30%; margin: 0 auto;">
                    
                    @component('app.produto-detalhe._components.form_create_edit', ['unidades' => $unidades])
                        
                    @endcomponent
                   
                </div>
                
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection