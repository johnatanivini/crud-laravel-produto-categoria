<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\ProdutoRepositoryInterface;
use Illuminate\Support\Collection;

class ProdutoRepository extends BaseRepository implements ProdutoRepositoryInterface
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
