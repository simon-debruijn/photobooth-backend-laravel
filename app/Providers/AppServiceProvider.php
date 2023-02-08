<?php

namespace App\Providers;

use App\Repositories\OrderInMemoryRepository;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(OrderRepositoryInterface::class, function ($app) {
            return $app->make(OrderInMemoryRepository::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
