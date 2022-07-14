<p>Preencha os campos abaixo para cadastrar um novo produto ao seu pedido.</p>

<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
    @csrf

    <select name="produto_id">
        <option value="">Selecione um produto</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}"
                {{old('produto_id') == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }}</option>
        @endforeach
    </select>
    <span class="erro"> {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}</span>

    <button class="borda-preta" type="submit">Cadastrar</button>
</form>
