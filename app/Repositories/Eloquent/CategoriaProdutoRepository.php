<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\CategoriaProdutoRepositoryInterface;
use Illuminate\Support\Collection;

class CategoriaProdutoRepository extends BaseRepository implements CategoriaProdutoRepositoryInterface
{

    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
