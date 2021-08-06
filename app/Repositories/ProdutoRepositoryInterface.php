<?php 

namespace App\Repositories;

use App\Models\Produto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

interface ProdutoRepositoryInterface
{
    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection;

    /**
     *
     * @param integer $id
     * @return boolean|null
     */
    public function delete(int $id): ?bool;

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param array $attributes
     * @return void
     */
    public function update(int $id, array $attributes): ?Produto;
}
