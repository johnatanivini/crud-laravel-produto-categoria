<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Boolean;

/**
 *  Interface EloquentInterface
 *  @package App\Repository
 */
interface EloquentRepositoryInterface
{
    /**
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function find(int $id): ?Model;
    /**
     *
     * @param array $attributos
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function create(array $attributos): Model;
}
