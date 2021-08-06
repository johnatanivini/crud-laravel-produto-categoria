<?php 

namespace App\Repositories;

use Illuminate\Support\Collection;

interface CategoriaProdutoRepositoryInterface
{
    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection;
}
