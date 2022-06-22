<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sitecontato>
 * 
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'telefone' => $this->faker->unique()->tollFreePhoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'motivo_contato' => $this->faker->numberBetween(1,3),
            'mensagem' => $this->faker->realTextBetween(30,150,2)
        ];
    }
}

/***********************************************NOTAS SOBRE FACTORY*****************************************************
 * php artisan make:factory SiteContatoFactory --model Sitecontato CRIA A FACTORY E EXTENDS AO MODEL
 * 
 * TENHO QUE POR \App\Models\Sitecontato::factory()->count(100)->create(); NO ARQUIVO SEEDER CORRESPONDENTE, NO CASO AQUI SiteConatoSeeder.php
 */