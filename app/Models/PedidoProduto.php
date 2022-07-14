<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;
    protected $table = 'pedidos_produtos'; /* USAR ESTE MÉTODO PARA AJUSTAR O NOME DA TABELA, DEVIDO O ELOQUENT USAR OUTRO PADRÃO PARA O NOME DA TABELA */
}
