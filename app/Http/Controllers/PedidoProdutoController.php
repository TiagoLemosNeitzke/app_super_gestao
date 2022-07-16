<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        //$pedido->produtos; //eager loading (carregamento ancioso)
        return view('app.pedido-produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        //dd($request->get('quantidade'));
        $request->validate(
            [
                'produto_id' => 'exists:produtos,id',
                'quantidade' => 'required'
            ],
            [
                'exists' => 'O produto selecionado não existe',
                'required' => 'O campo quantidade é obrigatório'
            ]
        );
       /* A FORMA ABAIXO DE SALVAR OS DADOS NA TABELA FUNCIONA, ESTÁ COMENTADO PARA ESTUDAR OUTRAS FORMAS */
        /*  $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save(); */

        /* ABAIXO ESTÃO DUAS FORMAS DISTINTAS DE CHAMAR O MÉTODO QUE ESTÁ IMPLEMENTADO NO MODEL PEDIDO */
        /* $pedido->produtos; */ //quando chamamos um método em formato de atributo o retorno é o registro do relacionameto | ESSA LINHA ESTÁ AQUI SÓ PARA EXEMPLIFICAR O RETORNO
        $pedido->produtos()->attach($request->get('produto_id'),['quantidade' => $request->get('quantidade')]); //quando chamo na forma de método o retorno é um objeto qua mapea o relacionamento

        /* EU PODERIA TAMBÉM ATUALIZAR VÁRIOS CAMPOS DE UMA VEZ. ABAIXO ESTÁ COMO FICARIA A SINTAXE */
        /* $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')],
            $request->get('outra_coluna') => ['nome_coluna' => $request->get('dados')] // poderia passar quantos eu precisasse
        ]); */
    
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
