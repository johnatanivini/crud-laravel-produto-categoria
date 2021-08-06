<?php 

namespace App\Repositories\Eloquent;

use App\Models\Produto;
use App\Repositories\ProdutoRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

/**
 * @property Produto $model
 */
class ProdutoRepository extends BaseRepository implements ProdutoRepositoryInterface
{

    public function __construct(Produto $model)
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
    
    /**
     *
     * @return bool
     */
    public function delete($id): bool
    {
        $produto = $this->model->find($id);
        return $produto->delete();
    }

    public function update(int $id, array $attributes): ?Produto
    {
        /**
         * @var Produto $produto
         */
        $produto = $this->model->find($id);

        if (!$produto) {
            return null;
        }

        $produto->setRawAttributes($attributes);

        $produto->update();

        return $produto;
    }
}
