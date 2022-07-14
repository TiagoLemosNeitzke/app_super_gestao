@extends('site.layouts.basico_autenticado')

@section('titulo', 'Pedido')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            
                <h1>Pedido - Cadastrar</h1>
            
            
        </div>
        <div class="menu" style="padding-top:15px;">
            <ul>
                <li><a href="{{route('pedido.create')}}">Novo</a></li> 
                <li><a href="{{route('pedido.index')}}">Voltar</a></li>
               
            </ul>
        </div>

        <div class="informacao-pagina">
           
                <div style="width: 30%; margin: 0 auto;">
                    
                    @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
                        
                    @endcomponent
                   
                </div>
                
        </div>
    </div>

    @include('site.layouts._partials.rodape')
@endsection