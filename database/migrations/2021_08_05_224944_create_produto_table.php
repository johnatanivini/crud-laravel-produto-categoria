<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produto', function (Blueprint $table) {
            $table->id('id_produto');
            $table->primary('id_produto', 'PK_tb_produto');
            $table->unsignedBigInteger('id_categoria_produto');
            $table->dateTime('data_cadastro');
            $table->string('nome_produto', 150);
            $table->decimal('valor_produto', 10, 2);
            $table->foreign('id_categoria_poduto', 'FK_tb_produto_tb_categoria_produto')
            ->references('id_categoria_planejamento')->on('tb_categoria_produto');
            $table->index(['id_produto, id_categoria_produto'], 'IXFK_tb_produto_tb_categoria_produto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produto');
    }
}
