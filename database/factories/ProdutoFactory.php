<?php

namespace Database\Factories;

use App\Models\CategoriaProduto;
use App\Models\Produto;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_produto' => $this->faker->name,
            'data_cadastro' => $this->faker->dateTime(),
            'valor_produto' => $this->faker->numberBetween(4, 50),
            'id_categoria_produto' => CategoriaProduto::factory()
    }
}
