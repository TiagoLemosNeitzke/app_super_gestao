{{$slot}}

<form action="{{route('site.contato')}}" method="post">
    @csrf {{-- @csrf GERA UM TOKEN PARA O FORMULÁRIO | É UM RECURSO DE SEGURANÇA --}}
    <input name="nome" type="text" placeholder="Nome" class="{{$classe}}" value="{{old('nome')}}"> {{-- O MÉTODO OLD() RECUPERA OS DADOS PREENCHIDOS E QUE PASSARAM NA VALIDAÇÃO, QUANDO ALGUM OUTRO DADO NÃO PASSA NA VALIDAÇÃO EM CONTATOCONTROLLER.PHP --}}
   {{-- apresenta erro, caso exista abaixo do input nome --}}
    @if($errors->has('nome'))
        <div class="erro_input">
            {{$errors->first('nome')}}
        </div>
    @endif
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{$classe}}" value="{{old('telefone')}}"> {{--  $classe pega a classe lá da view contato.blade.php --}}
    
    <div class="erro_input">
        {{-- o teste ternário abaixo faz a mesma coisa que os @ifs --}}
        {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
    </div>
    
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{$classe}}" value="{{old('email')}}">
    @if($errors->has('email'))
    <div class="erro_input">
        {{$errors->first('email')}}
    </div>
    @endif
    <br>
    <select name="motivo_contato_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contato as $chave => $motivo) 
            <option value="{{$motivo->id}}" {{old('motivo_contato_id') == $motivo->id ? 'selected' : ''}}>{{$motivo->motivo_contato}}</option>
                   
        @endforeach
       
    </select>
    @if($errors->has('motivo_contato_id'))
    <div class="erro_input">
        {{$errors->first('motivo_contato_id')}}
    </div>
    @endif
    <br>
    <textarea name="mensagem" class="{{$classe}}" placeholder="Preencha aqui a sua mensagem">@if (old('mensagem') != ''){{{old('mensagem')}}} @endif</textarea>
    @if($errors->has('mensagem'))
    <div class="erro_input">
        {{$errors->first('mensagem')}}
    </div>
    @endif
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
    {{-- apresenta os erros de preenchimento do formulário --}}
    {{-- @if ($errors->any())
        <div style="position: absolute; top: 0; left:0; width:100%; background:blue;">
            @foreach ($errors->all() as $erro)
                {{$erro}}
            @endforeach
        </div>
    @endif --}}
    
</form>