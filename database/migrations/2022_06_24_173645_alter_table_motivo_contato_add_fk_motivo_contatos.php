<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // adicionando a coluna motivo_contato_id
       Schema::table('sitecontatos', function(Blueprint $table){
        $table->unsignedBigInteger('motivo_contato_id');
    });

    //atribuindo motivo_contato para a nova coluna motivo_contato_id
    DB::statement('update sitecontatos set motivo_contato_id = motivo_contato');

    //criando a fk e removendo a coluna motivo_contato
    Schema::table('sitecontatos', function(Blueprint $table){
        $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');

        $table->dropColumn('motivo_contato');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sitecontatos', function(Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('sitecontatos_motivo_contato_id_foreign');
        });

        DB::statement('update sitecontatos set motivo_contato = motivo_contato_id');

        Schema::table('sitecontatos', function(Blueprint $table){
            $table->dropColumn('motivo_contato_id');
        });
    }
};
