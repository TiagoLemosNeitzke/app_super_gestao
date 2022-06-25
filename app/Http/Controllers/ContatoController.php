<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitecontato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato()
    {
        // O CÓDIGO ABAIXO É PARA TESTE NA VIEW
        $motivo_contato = MotivoContato::all();

        /*echo '<pre>';
        print_r($request->all());  O REQUEST RECEBE OS DADOS DO FORMULÁRIO COMO ARRAY | USAR $request->input('nomeDoCampo) 
        echo '</pre>';
        */
        //$contato = new Sitecontato();
        //$contato->create($request->all());

        // AS DUAS MANEIRAS DE GRAVAR OS DADOS NO BANCO QUE ESTÃO ABAIXO PRECISAM DO MÉTODO SAVE()

        //  $contato->fill($request->all()); | ESTÁ É OUTRA FORMA DE PERSISTIR OS DADOS NO BANCO

        /* O CÓDIGO ABAIXO É UM EXEMPLO DE COMO POSSO POPULAR O BANCO COM OS DADOS VIDOS DO FRONT
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save(); 
        */
        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contato' => $motivo_contato]);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'email:rfc,dns',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required | max:200'
        ]);

        Sitecontato::create($request->all());
        return redirect()->route('site.index');
    }
}
