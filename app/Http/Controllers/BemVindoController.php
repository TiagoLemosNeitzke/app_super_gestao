<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BemVindoController extends Controller
{
    public function bemvindo() {
        return view('welcome');
    }
}
