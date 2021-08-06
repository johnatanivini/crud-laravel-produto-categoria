<?php

namespace App\Repositories\Eloquent;


use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 *  Base dos repositorios
 */
class BaseRepository implements EloquentRepositoryInterface
{

    public function __construct(protected Model $model)
    {
    }

    /**
     *
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }
    /**
     *
     * @param array $attributos
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributos): Model
    {
        return $this->model->create($attributos);
    }
}
