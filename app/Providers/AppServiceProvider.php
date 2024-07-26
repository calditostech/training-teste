<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TrainingRepositoryInterface;
use App\Repositories\TrainingRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TrainingRepositoryInterface::class, TrainingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
