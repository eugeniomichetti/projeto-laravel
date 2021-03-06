<?php

namespace ProjetoLaravel\Providers;

use Illuminate\Support\ServiceProvider;

class ProjetoLaravelRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \ProjetoLaravel\Repositories\ClientRepository::class,
            \ProjetoLaravel\Repositories\ClientRepositoryEloquent::class
        );
        $this->app-> bind(
            \ProjetoLaravel\Repositories\ProjectRepository::class,
            \ProjetoLaravel\Repositories\ProjectRepositoryEloquent::class
        );
        $this->app-> bind(
            \ProjetoLaravel\Repositories\ProjectNoteRepository::class,
            \ProjetoLaravel\Repositories\ProjectNoteRepositoryEloquent::class
        );
        $this->app-> bind(
            \ProjetoLaravel\Repositories\ProjectFileRepository::class,
            \ProjetoLaravel\Repositories\ProjectFileRepositoryEloquent::class
        );
        $this->app->bind(
            \ProjetoLaravel\Repositories\UserRepository::class,
            \ProjetoLaravel\Repositories\UserRepositoryEloquent::class
        );
    }
}
