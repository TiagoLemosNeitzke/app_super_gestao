<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Fornecedor;
use Illuminate\Support\Str;

class FornecedoresController extends Controller
{
    public function fornecedores()
    {
        return view('site.fornecedores');
    }

    public function index()
    {
        $fornecedores = [
            0 => [0 => '', 'fornecedor1', 'fornecedor2', 'fornecedor3', 'fornecedor4', 'fornecedor5'],
            1 => ['nome' => 'fornecedor 2', 'cnpj' => 15543678000987, 'endereco', 'ddd' => '67', 'telefone' => '3467-5981'],
            2 => ['nome' => 'fornecedor 3', 'cnpj' => 15543678000945, 'endereco' => 'Rua Fulano', 'ddd' => '46', 'telefone' => '3467-5982'],
            3 => ['nome' => 'fornecedor 4', 'cnpj' => 15543678000956, 'endereco' => 'Rua Beltrano', 'ddd' => '11', 'telefone' => '3467-5983']
        ];

        /* sitaxe do operador ternário | pode ser encadeado, mas não é recomendado | é bastante utilizado quando vamos atribuir um valor a uma var
        
            condição ? se verdade : se falso;

            NA VIEW TEM UM TESTE MAIS SIMPLES QUE O TESTE ABAIXO QUE FAZ BASICAMENTE A MESMA COISA

        */

        echo isset($fornecedores[1]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';

        return view('app.fornecedor.index', compact('fornecedores'));
    }

    public function consultarIndex()
    {
        return view('site.consultar');
    }

    public function consultar()
    {

        $fornecedores = new Fornecedor;
        $nome = $_POST['nome'];
        $site = $_POST['site'];
        $uf = $_POST['uf'];
        $email = $_POST['email'];
        $fornecedores = $fornecedores
            ->orwhere('nome', $nome)
            ->orWhere('site', $site)
            ->orWhere('uf', $uf)
            ->orWhere('email', $email)
            ->get();

        return view('site.consultar', ['fornecedores' => $fornecedores]);
    }

    public function cadastrarIndex()
    {
        return view('site.cadastrar');
    }

    public function cadastrar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required',
                'site' => 'required',
                'uf' => 'required |max:2',
                'email' => 'email:rfc,dns'
            ],
            [
                'email.email' => 'O email informado não é válido.',
                'required' => 'O campo :attribute é obrigatório e precisa ser preenchido.',
                'uf.max' => 'Informe somente a sigla do estado',

            ]


        );

        $fornecedores = new Fornecedor;
        $nome = $_POST['nome'];

        $fornecedor = $fornecedores->where('nome', $nome)->get();
        $fornecedor->all();

        if (isset($fornecedor->toArray()[0]['nome']) == $_POST['nome']) {
            return view('site.cadastrar', ['erro' => 1]);
        } else {
            $uf = $_POST['uf'];
            $uf = Str::upper($uf);
            $fornecedor = new Fornecedor;
            $fornecedor->nome = $request->nome;
            $fornecedor->site = $request->site;
            $fornecedor->uf = $uf;
            $fornecedor->email = $request->email;
            $fornecedor->save();
            return view('site.cadastrar', ['sucesso' => '']);
        };
    }

    public function atualizarIndex()
    {
        $id = $_GET;
       
        $fornecedor = Fornecedor::find($id);
       // dd($fornecedor[0]);
        return view('site.atualizar', ['fornecedor' => $fornecedor]);
    }

    public function atualizar(Request $request)
    {
        $id = $request->id;
        //dd($request->id);
        $uf = $_POST['uf'];
        $uf = Str::upper($uf);
        $fornecedor = Fornecedor::find($id);
        //dd($fornecedor->nome);
        $fornecedor->nome = $request->nome;
        $fornecedor->site = $request->site;
        $fornecedor->uf = $uf;
        $fornecedor->email = $request->email;
        //dd($fornecedor);
        $fornecedor->save();
        return redirect()->route('app.fornecedores');
    }
}
