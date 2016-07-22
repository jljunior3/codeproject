<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;

class CodeProjectRepositoryProvider extends ServiceProvider
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
            \CodeProject\Repositories\IClientRepository::class,
            \CodeProject\Repositories\ClientRepositoryEloquent::class
        );
        $this->app->bind(
            \CodeProject\Repositories\IProjectRepository::class,
            \CodeProject\Repositories\ProjectRepositoryEloquent::class
        );
        $this->app->bind(
            \CodeProject\Repositories\IProjectNoteRepository::class,
            \CodeProject\Repositories\ProjectNoteRepositoryEloquent::class
        );
        $this->app->bind(
            \CodeProject\Repositories\IProjectTasksRepository::class,
            \CodeProject\Repositories\ProjectTasksRepositoryEloquent::class
        );
        $this->app->bind(
            \CodeProject\Repositories\IProjectMemberRepository::class,
            \CodeProject\Repositories\ProjectMemberRepositoryEloquent::class
        );
    }
}
