<?php

namespace Tests\Feature;

use App\Models\CategoriaProduto;
use App\Models\Produto;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriaProdutoTest extends TestCase
{
    use RefreshDatabase;

    public function up()
    {

    }

    /**
     * A basic test example.
     *
     * @return void
    */
    public function testObterTodoAsCategorias()
    {
        $categorias = CategoriaProduto::factory(10)->create();
        $this->assertCount(10, $categorias);
    }

    public function testRemoverUmaCategoria()
    {
        $categoria = CategoriaProduto::factory()->create();
        $categoria->delete();

        $this->assertDeleted($categoria->getTable(), ['id_categoria_planejamento' => 1]);
    }

    public function testAtualizarUmaCategoria()
    {

        $categoria = CategoriaProduto::factory()->createOne([
            'nome_categoria' => 'Bombons',
        ]);

        $categoria->nome_categoria = 'Bombons';

        $categoria->save();

        $categoriaAtualizado = CategoriaProduto::find($categoria->id_categoria_planejamento);

        $this->assertEquals('Bombons', $categoriaAtualizado->nome_categoria);
    }
}
