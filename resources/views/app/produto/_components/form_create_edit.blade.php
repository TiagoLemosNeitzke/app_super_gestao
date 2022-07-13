@if (isset($produto->id))
    <p>Faça a edição do produto nos campos abaixo.</p>
@else
    <p>Preencha os campos abaixo para cadastrar um novo produto.</p>
@endif

@if (isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('produto.store') }}" method="post">
            @csrf
@endif
<select name="fornecedor_id">
    <option value="">Selecione um fornecedor</option>
    @foreach ($fornecedores as $fornecedor)
        <option value="{{ $fornecedor->id }}"
            {{ $produto->fornecedor ?? old('fornecedor_id') == $fornecedor->id ? 'selected' : '' }}>
            {{ $fornecedor->nome }}</option>
    @endforeach
</select>
<span class="erro"> {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}</span>

<input class="borda-preta" type="text" name="nome" placeholder="Nome do produto" value="{{ $produto->nome ?? old('nome') }}">
<span class="erro"> {{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>

<input class="borda-preta" type="text" name="descricao" placeholder="Descrição do produto"
    value="{{ $produto->descricao ?? old('descricao') }}">
<span class="erro"> {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</span>

<input class="borda-preta" type="text" name="peso" placeholder="Peso do produto" value="{{ $produto->peso ?? old('peso') }}">
<span class="erro"> {{ $errors->has('peso') ? $errors->first('peso') : '' }}</span>

<select name="unidade_id">
    <option value="">Selecione a unidade da empresa</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach

</select>
<span class="erro"> {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</span>

<input class="borda-preta" type="text" name="comprimento" placeholder="Comprimento do produto" value="{{$produto->comprimento ?? old('comprimento')}}">
<span class="erro">{{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}</span>

<input class="borda-preta" type="text" name="largura" placeholder="Largura do produto" value="{{$produto->largura ?? old('largura')}}">
<span class="erro">{{$errors->has('largura') ? $errors->first('largura') : ''}}</span>

<input type="text" class="borda-preta" name="altura" placeholder="Altura do produto" value="{{$produto->altura ?? old('altura')}}">
<span class="erro">{{$errors->has('altura') ? $errors->first('altura') : ''}}</span>

@if (isset($produto->id))
    <button class="borda-preta" type="submit">Atualizar</button>
@else
    <button class="borda-preta" type="submit">Cadastrar</button>
@endif
</form>
