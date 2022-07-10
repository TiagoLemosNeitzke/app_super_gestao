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
<input class="borda-preta" type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}">
<span class="erro"> {{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>

<input class="borda-preta" type="text" name="descricao" placeholder="Descricao"
    value="{{ $produto->descricao ?? old('descricao') }}">
<span class="erro"> {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</span>

<input class="borda-preta" type="text" name="peso" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}">
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

@if (isset($produto->id))
    <button class="borda-preta" type="submit">Atualizar</button>
@else
    <button class="borda-preta" type="submit">Cadastrar</button>
@endif
</form>
