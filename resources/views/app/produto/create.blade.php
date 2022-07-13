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
                    
                    @component('app.produto._components.form_create_edit', ['unidades' => $unidades, 'fornecedores' => $fornecedores])
                        
                    @endcomponent
                   
                </div>
                
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection