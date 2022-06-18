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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id'); // ESSA CHAVE VEM DA TABELA Produtos OU SEJA CHAVE ESTRAGEIRA || OLHAR SEMPRE NA TABELA DE ORIGEM O TIPO DA CHAVE PRIMÁRIA, PRECISA SER IGUAL PARA NÃO DAR ERRO
            $table->float('comprimento',8,2);
            $table->float('largura',8,2);
            $table->float('altura',8,2);
            $table->timestamps();

            //a linha abaixo indica de onde vêm a foreing key
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id'); // GARANTE O RELACIONAMENTO DE 1 PRA 1, SEM ESTA INSTRUÇÃO TERÍA UMA RELAÇÃO DE 1 PRA MUITOS
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
