<?php

namespace App\Providers;

use App\Repositories\CategoriaProdutoRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\CategoriaProdutoRepository;
use App\Repositories\Eloquent\ProdutoRepository;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\ProdutoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ProdutoRepositoryInterface::class, ProdutoRepository::class);
        $this->app->bind(CategoriaProdutoRepositoryInterface::class, CategoriaProdutoRepository::class);
    }
}
