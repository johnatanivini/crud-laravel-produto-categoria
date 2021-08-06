<?php

namespace Database\Seeders;

use App\Models\CategoriaProduto;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaProduto::factory(5)->create();
    }
}
