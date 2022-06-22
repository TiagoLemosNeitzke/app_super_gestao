<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sitecontato;
use Database\Factories\SiteContatoFactory;
use Faker\Factory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*  Sitecontato::create([
            'nome' => 'Jorge',
            'telefone' => '(34) 99924-2499',
            'email' => 'jorge@jorge.jorge.br',
            'motivo_contato' => 2,
            'mensagem' => 'mensagem criada no seeder'
        ]);    */  
        \App\Models\Sitecontato::factory()->count(100)->create();
        
    }
}
