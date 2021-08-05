<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaProduto extends Model
{
    use HasFactory;

    protected string $table = 'tb_categoria_produto';

    protected array $fillable = [
        'nome_categoria'
    ];

    /**
     * Retorna para categoria especifica
     * Todos os produtos a ela relacionados
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class, 'id_categoria_planejamento', 'id_categoria_produto');
    }
}
