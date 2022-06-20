<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores'; //USAR SEMPRE QUE O NOME DA TABELA NÃO FOR SÓ ACRESCIDA DE S NO FINAL, POIS O ELOQUENT NÃO CONSIGUIRÁ ENCONTRA-LA SEM QUE EU SET ISSO
}
