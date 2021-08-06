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

   /**
     *
     * @return bool
     */
    public function delete($id): bool
    {
        $categoriaProduto = $this->model->find($id);
        return $categoriaProduto->delete();
    }


    public function update(int $id, array $attributes): ?CategoriaProduto
    {
        $categoria = $this->model->find($id);

        if (!$categoria) {
            return null;
        }

        $categoria->nome_categoria = $attributes['nome_categoria'];

        $categoria->update();

        return $categoria;
    }
}
