<?php 

namespace App\Repositories;

use Illuminate\Support\Collection;

interface ProdutoRepositoryInterface
{

    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection;
}
