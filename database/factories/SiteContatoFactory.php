<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     //Verificar tipo de dados na hora da criação da factory na biblioteca Faker presente no GitHub
     //https://github.com/fzaninotto/Faker
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'telefone' => $this->faker->tollFreePhoneNumber,
            'email' => $this->faker->email,
            'motivo_contatos_id' =>$this->faker->numberBetWeen(1,3),
            'mensagem' => $this->faker->text(200),
        ];
    }
}
