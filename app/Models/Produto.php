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
    protected $table = 'tb_produto';

    public $timestamps = false;

    /**
     *
     * @var array $dates
     */
    protected $dates = [
        'data_cadastro'
    ];

    /**
     * Campos que podem ser salvos
     *
     * @var array $fillable
     */
    protected $fillable = [
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
