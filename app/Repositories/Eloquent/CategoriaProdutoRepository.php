<?php 

namespace App\Repositories\Eloquent;

use App\Models\CategoriaProduto;
use App\Repositories\CategoriaProdutoRepositoryInterface;
use Illuminate\Support\Collection;

class CategoriaProdutoRepository extends BaseRepository implements CategoriaProdutoRepositoryInterface
{
    
    public function __construct(CategoriaProduto $model)
    {
            parent::__construct($model);
    }
    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
