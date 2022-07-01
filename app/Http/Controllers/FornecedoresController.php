<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Fornecedor;

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
        $fornecedor = $fornecedores->where('nome', $nome)->get();
       
        /* echo '<pre>';
        print_r( $fornecedor->toArray());
        echo '</pre>'; */
        return view('site.consultar', ['fornecedor' => $fornecedor->toArray()]);
    }
}
