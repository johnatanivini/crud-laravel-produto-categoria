<?php

namespace Database\Factories;

use App\Models\CategoriaProduto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriaProduto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_categoria' => $this->faker->title(),
        ];
    }
}
