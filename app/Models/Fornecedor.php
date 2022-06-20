<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores'; //USAR SEMPRE QUE O NOME DA TABELA NÃO FOR SÓ ACRESCIDA DE S NO FINAL, POIS O ELOQUENT NÃO CONSIGUIRÁ ENCONTRA-LA SEM QUE EU SET ISSO 

    
    protected $fillable = ['nome', 'site', 'uf', 'email']; // PRECISO DESTE ATRIBUTO PARA USAR O MÉTODO ESTÁTICO CREATE NO TINKER | sintaxe no terminal \App\Models\Fornecedor::create(['nome'=>'Fornecedor2','site'=>'fornecedor2.com.br','uf'=>'MS','email'=>'fornecedor2@teste.com.br']);
}
/*                                                      NOTAS DE USO DO TINKER
 Sintaxe no terminal para usar o TINKER
    abrir o tinker => php artisan tinker
    instanciar um objeto => $fornecedor = new \App\Models\Fornecedor;
    set valores => $fornecedor->nome = 'Fornecedor1'; tem que usar certinho como pede no banco, se for string usa string, se for int usa int...
                    $fornecedor->site = 'site.fornecedor!.com.br';
                    $fornecedor->uf = 'SP';
                    $fornecedor->email = 'fornecedor1@teste.com.br';
    conferindo se está tudo certo => print_r($fornecedor->getAttributes());
    Salvando dados no banco => $fornecedor->save();


PARA RECUPERAR OS DADOS DO BANCO | RETORNA UMA COLLECTION
        use \App\Models\Fornecedor;
        $f = Fornecedores::all();

PARA OBTER O RETORNO COMO ARRAY 
    use \App\Models\Fornecedor;
    $f = Fornecedores;
    print_r($f->toArray());

PARA RETORNAR APENAS UM FORNECEDOR DO BANCO
    use \App\Models\Fornecedor;
    $f = Fornecedores;
    $f->find(AQUI PASSA A KEY(ID NESTE CASO)); | POSSO PASSAR UM ARRAY DE IDS PRA RETORNAR SOMENTE OS FORNECEDORES QUE EU QUISER PESQUISAR

OPERADORES DE COMPARAÇÃO | WHERE
        use App\Models\Sitecontato;
        $x = Sitecontato::where('id', '>', '1')->get(); | $x = Sitecontato::where('nome_coluna', 'operador_comparacao', 'valor')-> o get() PARA RETORNAR UMA COLECTION; OPERADORES POSSIVEIS DE USO SÃO: > >= < <+  <>(DIFERENTE) ==(PESQUISA POR IGUALDADE É SÓ OMITIR O OPERADOR) like(COM BASE EM UMA PARTE DE UMA STRING FAZ PESQUISA EM UMA DETERMINADA COLUNA)
EXEMPLO DE USO DO OPERADOR LIKE
         use App\Models\Sitecontato;
        $x = Sitecontato::where('mensagem', 'like', '%ste%');->get() | VAI PESQUISAR NA COLUNA MENSAGEM PELA STRING 'teste' | O % É USADO PARA INDICAR QUE PODE TER QUALQUER COISA ANTES OU DEPOIS DA STRING

OPERADORES DE COMPARAÇÃO | WHEREIN | WHERENOTIN -> whereNotIn retorna os resultados que forem diferentes da consulta
        use App\Models\Sitecontato;
        $x = Sitecontato::whereIn('motivo_contato', [1,3])->get(); |sintaxe $x = Sitecontato::whereIn('campo_a_ser_comparado_por_igualdade', 'conjunto_de_parametros')->get(); | OS PARAMETROS PODE SER PASSADOS POR ARRAY | PODE SER DO TIPO NUMÉRICO, STRING OU DATAS

OPERADORES DE COMPARAÇÃO | WHEREBETWEEN -> RETORNA UMA CONSULTA ENTRE E INCLUSIVE 1 E 3, SE USASSEMOS O EXEMPLO ACIMA.
OPERADORES DE COMPARAÇÃO | WHERENOTBETWEEN -> RETORNA TUDO O QUE NÃO ESTIVER DENTRO DO INTERVELO 1 E 3. POSSO USAR PARA VALORES NUMÉRICOS E DATAS

USANDO DOIS OU MAIS WHERE posso usar o or | orWhere toda vez que eu usaria no banco
        use App\Models\Sitecontato;
        $x = Sitecontato::where('nome','<>','Fernando')->whereIn('motivo_contato',[1,2])->whereBetween('created_at',['2022-06-20 0:00:00', '2022-06-20 23:59:59'])->get();

PESQUISANDO POR VALORES NULL | WHERENULL | O OPOSTO É WHERENOTNULL -> retorna todos os registros não null
        use App\Models\Sitecontato
        $x = Sitecontato::whereNull('created_at')->get();

PESQUISANDO POR DATAS | WHEREDATE
        use App\Models\Sitecontato;
        $x = Sitecontato::whereDate('created_at', '2022-06-20')->get();

PESQUISANDO POR DIA | WHEREDAY
        use App\Models\Sitecontato;
        $x = Sitecontato::whereDay('created_at', '20')->get();

PESQUISANDO POR MÊS | WHEREMOUNTH
        use App\Models\Sitecontato;
        $x = Sitecontato::whereMonth('created_at', '06')->get();

PESQUISANDO POR ANO | WHEREYEAR
        use App\Models\Sitecontato;
        $x = Sitecontato::whereYear('created_at', '2022')->get();

PESQUISANDO POR TIME | WHERETIME
        use App\Models\Sitecontato;
        $x = Sitecontato::whereTime('created_at','=', '15:18:37')->get(); | POSSO UTILIZAR TODOS OS OPERADORES DE COMPARAÇÃO

PESQUISANDO POR COLUNAS | WHERECOLUMN
        use App\Models\Sitecontato;
        $x = Sitecontato::whereColumn('created_at','=', 'updated_at')->get(); | POSSO UTILIZAR TODOS OS OPERADORES DE COMPARAÇÃO | NÃO COMPARA NULL
*/