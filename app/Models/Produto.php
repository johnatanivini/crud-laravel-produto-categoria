<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected string $table = 'tb_produto';

    /**
     *
     * @var array $dates
     */
    protected array $dates = [
        'data_cadastro'
    ];

    /**
     * Campos que podem ser salvos
     *
     * @var array $fillable
     */
    protected array $fillable = [
        'data_cadastro',
        'nome_produto',
        'valor_produto',
        "id_categoria_produto"
    ];

    /**
     * Categoria Produto
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoriaProduto(): BelongsTo
    {
        return $this->belongsTo(CategoriaProduto::class, 'id_categoria_produto', 'id_categoria_planejamento');
    }
}
