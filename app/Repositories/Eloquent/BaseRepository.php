<?php

namespace App\Repositories\Eloquent;


use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 *  Base dos repositorios
 */
class BaseRepository implements EloquentRepositoryInterface {


    public function __construct(protected Model $model)
    {
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $attributos): Model
    {
        return $this->model->create($attributos);
    }
}
