<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Middleware\LogAcessoMiddleware; tem que chamar o middleware aqui se quiser usar no construct

class SobreNosController extends Controller
{
   /*  public function __construct()
    {
        $this->middleware(LogAcessoMiddleware::class);
    } */
    public function sobreNos() {
        return view('site.sobre-nos');
    }
}
