@if (isset($produto_detalhe->id))
    <p>Faça a edição do produto nos campos abaixo.</p>
@else
    <p>Preencha os campos abaixo para cadastrar os detalhes do produto.</p>
@endif

@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="post">
            @csrf
@endif
<input class="borda-preta" type="text" name="produto_id" placeholder="Id do produto" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
<span class="erro"> {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}</span>

<input class="borda-preta" type="text" name="comprimento" placeholder="Comprimento"
    value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
<span class="erro"> {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}</span>

<input class="borda-preta" type="text" name="largura" placeholder="Largura" value="{{ $produto_detalhe->largura ?? old('largura') }}">
<span class="erro"> {{ $errors->has('largura') ? $errors->first('largura') : '' }}</span>

<input class="borda-preta" type="text" name="altura" placeholder="Altura" value="{{ $produto_detalhe->altura ?? old('altura') }}">
<span class="erro"> {{ $errors->has('altura') ? $errors->first('altura') : '' }}</span>

<select name="unidade_id">
    <option value="">Selecione a unidade da empresa</option>
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach

</select>
<span class="erro"> {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</span>

@if (isset($produto_detalhe->id))
    <button class="borda-preta" type="submit">Atualizar</button>
@else
    <button class="borda-preta" type="submit">Cadastrar</button>
@endif
</form>