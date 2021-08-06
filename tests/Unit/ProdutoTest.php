<?php

namespace Tests\Unit;

use App\Models\CategoriaProduto;
use App\Models\Produto;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
    */
    public function testObterTodosOsProdutos()
    {
        $factory = Produto::factory(10)->create();
        $this->assertCount(10, $factory);
    }

    public function testRemoverUmProduto()
    {
        $produto = Produto::factory()->create();
        $produto->delete();

        $this->assertDeleted($produto->getTable(), ['id_produto' => 1]);
    }

    public function testAtualizarUmProduto()
    {

        $produto = Produto::factory()->createOne([
            'nome_produto' => 'Bala de Menta',
            'data_cadastro' => new DateTime('now'),
            'valor_produto' => 90.9,
            'id_categoria_produto' => CategoriaProduto::factory()->createOne([
                'nome_categoria' => 'Bombons'
            ])
        ]);

        $produto->nome_produto = 'Bala de Chocolate';

        $produto->save();

        $produtoAtualizado = Produto::find($produto->id_produto);

        $this->assertEquals('Bala de Chocolate', $produtoAtualizado->nome_produto);
    }

    public function testGetProdutoPorCategoria()
    {
        $categoriaFactory = CategoriaProduto::factory()->createMany([
            [
                'nome_categoria' => 'Livro'
            ],
            [
                'nome_categoria' => 'Frutas'
            ]
            ]);

        $produtoFactory = Produto::factory()->createMany([
                [
                'nome_produto' => 'A guerra do amanhã',
                'data_cadastro' => new DateTime('now'),
                'valor_produto' => 35.90,
                'id_categoria_produto' => $categoriaFactory->first()
                ],
                [
                    'nome_produto' => 'Bananas',
                    'data_cadastro' => new DateTime('now + 1 days'),
                    'valor_produto' => 3.25,
                    'id_categoria_produto' => $categoriaFactory->last()
                ]
            ]);

        $this->assertEquals('Livro', $produtoFactory->first()->categoriaProduto->nome_categoria);
        $this->assertEquals('Frutas', $produtoFactory->last()->categoriaProduto->nome_categoria);
    }
}
