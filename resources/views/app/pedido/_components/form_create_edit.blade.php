@if (isset($pedido->id))
    <p>Faça a edição do pedido nos campos abaixo.</p>
@else
    <p>Preencha os campos abaixo para cadastrar um novo pedido.</p>
@endif

@if (isset($pedido->id))
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('pedido.store') }}" method="post">
        @csrf
@endif

<select name="cliente_id">
    <option value="">Selecione um Cliente</option>
    @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}"
            {{ $pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected' : '' }}>
            {{ $cliente->nome }}</option>
    @endforeach
</select>
<span class="erro"> {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}</span>

@if (isset($pedido->id))
    <button class="borda-preta" type="submit">Atualizar</button>
@else
    <button class="borda-preta" type="submit">Cadastrar</button>
@endif
</form>