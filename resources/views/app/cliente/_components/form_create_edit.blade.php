@if (isset($cliente->id))
    <p>Faça a edição do cliente nos campos abaixo.</p>
@else
    <p>Preencha os campos abaixo para cadastrar um novo cliente.</p>
@endif

@if (isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="post">
        @csrf
        @method('PUT')
    @else
        <form action="{{ route('cliente.store') }}" method="post">
        @csrf
@endif

<input class="borda-preta" type="text" name="nome" placeholder="Nome do cliente" value="{{ $cliente->nome ?? old('nome') }}">
<span class="erro"> {{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>

@if (isset($cliente->id))
    <button class="borda-preta" type="submit">Atualizar</button>
@else
    <button class="borda-preta" type="submit">Cadastrar</button>
@endif
</form>
