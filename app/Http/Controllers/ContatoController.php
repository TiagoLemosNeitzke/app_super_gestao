<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitecontato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        /*echo '<pre>';
        print_r($request->all());  O REQUEST RECEBE OS DADOS DO FORMULÁRIO COMO ARRAY | USAR $request->input('nomeDoCampo) 
        echo '</pre>';
        */
        $contato = new Sitecontato();
        $contato->create($request->all());

        // AS DUAS MANEIRAS DE GRAVAR OS DADOS NO BANCO QUE ESTÃO ABAIXO PRECISAM DO MÉTODO SAVE()

      //  $contato->fill($request->all()); | ESTÁ É OUTRA FORMA DE PERCISTIR OS DADOS NO BANCO

        /* O CÓDIGO ABAIXO É UM EXEMPLO DE COMO POSSO POPULAR O BANCO COM OS DADOS VIDOS DO FRONT
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save(); 
        */
        return view('site.contato');
    }
}
