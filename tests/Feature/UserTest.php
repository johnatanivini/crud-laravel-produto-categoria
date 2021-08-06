<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
    */
    public function testObterTodosOsProdutos()
    {
        $factory = User::factory(10)->create();
        $this->assertCount(10, $factory);
    }

    public function testRemoverUmProduto()
    {
        $usuario = User::factory()->create();
        $usuario->delete();
        $this->assertDeleted($usuario->getTable(), ['id' => 1]);
    }

    public function testAtualizarUmProduto()
    {

        $usuario = User::factory()->createOne([
            'name' => 'john',
            'email' => 'ivini@gmail.com',
            'password' => 123456,
        ]);

        $usuario->email = 'paulo@gmail.com';
        $usuario->save();
        $usuarioAtualizado = User::find($usuario->id);
        $this->assertEquals('paulo@gmail.com', $usuarioAtualizado->email);
    }
}
