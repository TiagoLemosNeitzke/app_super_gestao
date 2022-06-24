{{$slot}}

<form action="{{route('site.contato')}}" method="post">
    @csrf {{-- @csrf GERA UM TOKEN PARA O FORMULÁRIO | É UM RECURSO DE SEGURANÇA --}}
    <input name="nome" type="text" placeholder="Nome" class="{{$classe}}" value="{{old('nome')}}"> {{-- O MÉTODO OLD() RECUPERA OS DADOS PREENCHIDOS E QUE PASSARAM NA VALIDAÇÃO, QUANDO ALGUM OUTRO DADO NÃO PASSA NA VALIDAÇÃO EM CONTATOCONTROLLER.PHP --}}
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{$classe}}" value="{{old('telefone')}}"> {{--  $classe pega a classe lá da view contato.blade.php --}}
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$classe}}" value="{{old('email')}}">
    <br>
    <select name="motivo_contato" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $chave => $motivo) 
            <option value="{{$motivo->id}}" {{old('motivo_contato') == $motivo->id ? 'selected' : ''}}>{{$motivo->motivo_contato}}</option>
                   
        @endforeach
       
    </select>
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">@if (old('mensagem') != ''){{{old('mensagem')}}} @endif</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>