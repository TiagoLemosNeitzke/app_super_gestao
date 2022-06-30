<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha não encontrado.';
        };

        if($request->get('erro') == 2){
            $erro = 'Acesso negado! Faça login para acessar a página.';
        };
        
        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);
        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User;

        $consulta_user_banco = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($consulta_user_banco->name)) {
            session_start();
            $_SESSION['nome'] = $consulta_user_banco->name;
            $_SESSION['email'] = $consulta_user_banco->email;
            $_SESSION['password'] = $consulta_user_banco->password;

            //dd($_SESSION);
            return redirect()->route('app.clientes');
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        };
       /*  echo '<pre>';
        print_r($consulta_user_banco);
        echo '</pre>'; */
        //echo $email . '<br>'. $password;
        //print_r($request->all());
    }
}
