<?php

namespace App\Providers;

use App\Repositories\RecordRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\RepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RepositoryInterface::class,
            RecordRepository::class
        );

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
