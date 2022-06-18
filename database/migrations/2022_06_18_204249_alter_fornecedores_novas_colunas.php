<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf',2);
            $table->string('email',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* O MÉTODO ABAIXO SERVE PARA REMOVER COLUNAS DA TABELA
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropColumn('uf'); PASSANDO UMA COLUNA PARA SER EXCLUIDA DA TABELA
            $table->dropColumn(['uf', 'email']); PASSANDO UM ARRAY DE COLUNAS PARA EXCLUIR VÁRIAS COLUNAS DA TABELA
        });
        
        DEPOIS DE USAR ESTES COMANDO PRECISA COMENTAR O CONTEÚDO DO MÉTODO UP (ACIMA) E RODAR O CAMANDO NO TERMINAL => php artisan migrate:rollback 
        POSSO EXECUTAR NO TERMINAL ESSE COMANDO TAMBÉM CASO EU QUERIA RETROCEDER MAIS DE UM PASSO NA CRIAÇÃO DAS TABELAS => php artisan migrate:rollback --step=2  <= O 2 INDICA QUANTOS PASSOS RETROCEDER

        Schema::dropIfExists('fornecedores'});  REMOVER UMA TABELA CASO ELA EXISTA

        Schema::dropIfExists('fornecedores'}); REMOVE SEM TESTAR SE EXISTE A TABELA
        
        */
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropColumn(['uf', 'email']);
        });
    }
};
