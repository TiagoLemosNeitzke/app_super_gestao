<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ESTE É UM FORMA DE POPULAR O BANCO COM SEEDERS
        $fornecedor = new Fornecedor;
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'fornecedor1.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'forncedor1@contato.com.br';
        $fornecedor->save();

        // OUTRA FORMA DE POPULAR O BANCO
        Fornecedor::create([
            'nome' => 'Fornecedor2',
            'site' => 'fornecedor2.com.br',
            'uf' => 'MS',
            'email' => 'contato@fornecedor2.com.br'
        ]);
    }
}

/****************************************NOTAS SOBRE SEEDERS*****************************************************
 * 
 * php artisan make:seeder NomeDoSeeder CRIA UM SEEDER
 * 
 *
 * $this->call(FornecedorSeeder::class); PRECISO CHAMAR O SEEDER QUE CRIEI AQUI LÁ NO ARQUIVO DatabaseSeeder.php
 * 
 * PRECISA RODAR O COMANDO NO TERMINAL php artisan db:seed ou php artisan db:seed --class SiteContatoSeeder PARA EXECUTAR UMA CLASS EXPECÍFICA
*/