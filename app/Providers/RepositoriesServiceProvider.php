<?php

namespace App\Providers;


use App\Repositories\UserRepositoryInterface;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\PermissionRepositoryInterface;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\PermissionRepository;


use App\Repositories\SubscribeRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
