<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::simplePaginate(2);
        /* foreach($produtos as $key => $produto) 
        {
            //print_r($produto->getAttributes());
            //echo '<br><br>';
            $produto_detalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
            if(isset($produto_detalhe))
            {
                //print_r($produto_detalhe->getAttributes());
                $produtos[$key]['comprimento'] = $produto_detalhe->comprimento;
                $produtos[$key]['altura'] = $produto_detalhe->altura;
                $produtos[$key]['largura'] = $produto_detalhe->largura;
            }

            PARA USAR O MÉTODO ACIMA PRECISO ADICIONAR NA VIEW INDEX DE PRODUTO O CÓDIGO ABAIXO

            <td>{{$produto->comprimento ?? ''}}</td>
            <td>{{$produto->altura ?? ''}}</td>
            <td>{{$produto->largura ?? ''}}</td>Ii
        } */

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = fornecedor::all();
        $unidades = Unidade::all();
        $produto_detalhe = ProdutoDetalhe::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores, 'produto_detalhe' => $produto_detalhe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|max:50|min:3',
                'descricao' => 'required|max:200|min:3',
                'peso' => 'required|integer',
                'unidade_id' => 'required|exists:unidades,id',
                'fornecedor_id' => 'required',
                'comprimento' => 'required|integer',
                'largura' => 'required|integer',
                'altura' => 'required|integer'
            ],

            [
                'required' => 'O campo :attribute é obrigatório e precisa ser preenchido.',
                'nome.max' => 'O campo nome ultrapassou o limite máximo 50 caracteres',
                'descricao.max' => 'O campo descrição ultrapassou o limite máximo 200 caracteres',
                'min' => 'O campo:attribute precisa ter no mínimo 3 caracteres',
                'integer' => 'O campo :attribute dever ser um número inteiro',
                'exists' => 'Unidade não encontrada'
            ]
        );
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate(
            [
                'nome' => 'required|max:50|min:3',
                'descricao' => 'required|max:200|min:3',
                'peso' => 'required|integer',
                'unidade_id' => 'required|exists:unidades,id',
                'fornecedor_id' => 'required',
                'comprimento' => 'required|integer',
                'largura' => 'required|integer',
                'altura' => 'required|integer'
            ],

            [
                'required' => 'O campo :attribute é obrigatório e precisa ser preenchido.',
                'nome.max' => 'O campo nome ultrapassou o limite máximo 50 caracteres',
                'descricao.max' => 'O campo descrição ultrapassou o limite máximo 200 caracteres',
                'min' => 'O campo:attribute precisa ter no mínimo 3 caracteres',
                'integer' => 'O campo :attribute dever ser um número inteiro',
                'exists' => 'Unidade não encontrada'
            ]
        );
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
