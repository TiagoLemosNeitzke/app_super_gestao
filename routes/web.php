<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    /-------------------------------------------------------------------------
    /           VERBOS HTTP PRA CONTROLAR A APLICAÇÃO
    /--------------------------------------------------------------------------
    / -> get
    /-> post
    /-> put
    /-> patch
    /-> delete
    /-> options
    */

    Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index'); //O NOME DA ROTA SERVE PRA USAR DENTRO DO LARAVEL, NÃO SERVE PRA CHAMAR A ROTA NO NAVEGADOR

    Route::get('/sobrenos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

    Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
    Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

    Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('site.login');

    Route::prefix('app')->group(function(){
        
        Route::get('/clientes', [\App\Http\Controllers\ClientesController::class, 'clientes'])->name('app.clientes');

        Route::get('/fornecedores', [\App\Http\Controllers\FornecedoresController::class, 'fornecedores'])->name('app.fornecedores');

        Route::get('/fornecedor', [App\Http\Controllers\FornecedoresController::class, 'index'])->name('app.fornecedor');
    
        Route::get('/produtos', [\App\Http\Controllers\ProdutosController::class, 'produtos'])->name('app.produtos');
    });

    // redirecionameto de rotas com redirect().

    Route::get('/rota1', function(){
        return 'Rota 1';
    })->name('site.rota1');

     Route::get('/rota2', function(){
        return redirect()->route('site.rota1'); // REDICIONA PRA ROTA 1. É A MESMA COISA QUE O EXEMPLO ABAIXO
    })->name('site.rota2'); 

    //Route::redirect('/rota2', '/rota1'); //AO ACESSAR A ROTA2 É REDIRECIONADO PARA A ROTA1

    // ROTA fallback.

    Route::fallback(function(){
        return 'Dá onde tu vêm? Pra onde tu vai? <br><br><strong> Rota não encontrada :( </strong> <br> <br> Está perdido meu filho? =>  <a href="'.route('site.index').'">Volte para o início</a>';
    });
   
    // PASSAGEM DE PARÂMETROS VIA ROTA.

    Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

    //---------------------------------------------------------------------------------------------------------------------------------------------------------

    // NA ROTA ABAIXO EU PASSO PARÂMETROS VIA GET, POR ISSO NÃO DÁ CONFLITO COM A ROUTE /contato anterior, posso passar quantos parâmetros eu precisar, basta adicionar /{nome do parâmetro}
    //não esquecer de adicionar na function o recebimento do parâmetro.
    // Para que a rota funcione ela precisa receber todos os parâmetros ou adicionar ? após o parâmetro para torna-lo opcional e preciso receber um default na minha function
    //IMPORTANTE: POSSO DEIXAR TODOS OS PARÂMETRO OPCIONAIS, MAS NÃO POSSO PULAR UM. POR EXEMPLO:
                    /*   Route::get('/contato/{nome?}/{email}/{assunto?}', function(string $nome = 'Não informado', string $assunto = 'este é o parâmetro default, pois não foi passado nada via get') {
                                    echo 'Estamos aqui: '. $nome. '. Quero falar sobre: '.$assunto;
                                        });
                                NO EXEMPLO ACIMA VAI DAR ERRO PORQUE O LARAVEL NÃO VAI CONSEGUIR FORMAR A ROTA. PARA FUNCIONAR TEM QUE SER ASSIM:

                           Route::get('/contato/{nome?}/{email?}/{assunto?}', function(string $nome = 'Não informado',string $email = 'não informado' ,string $assunto = 'parâmetro não informado') {
                                    echo 'Estamos aqui: '. $nome. ' E-mail: '. $email .' Quero falar sobre: '.$assunto;
                                        });
                     */
    /* Route::get('/bemvindo', [\App\Http\Controllers\BemVindoController::class, 'bemvindo']);

    Route::get('/contato/{nome}/{assunto?}', function(string $nome, string $assunto = 'este é o parâmetro default, pois não foi passado nada via get') {
        echo 'Estamos aqui: '. $nome. '. Quero falar sobre: '.$assunto;
    }); */

    // ESTE EXEMPLO DE ROTA O DEFAULT 1 SERIA O ID RECEBIDO DE UM SELECT DO FRONT, NESTE CASO COMO O PARÂMETRO ESTA TIPADO COM INT
    // SE EU RECEBER UM STRING TEREI UM TypeError, ENTÃO POSSO TRATAR ISSO COM EXPRESSÕES REGULARES,QUE, NESTE CASO É O where ABAIXO
    // O where ESPERA DOIS PARÂMETROS, o nome do parâmetro E A expressão regular PARA DETERMINAR SE VAI SER ACEITO OU NÃO
   /*  Route::get('/contato/{nome}/{assunto}/{categoria_id}', function(string $nome,string $assunto ,int $categoria_id = 1) {
        echo 'Nome: '. $nome.' Assunto: '.$assunto .'. Categoria: '.$categoria_id;
    })->where('nome', '[A-Za-z]+')->where('categoria_id', '[0-9]+');
 */