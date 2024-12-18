<?php

namespace App\Providers;

use App\Repositories\NotationRepository;
use App\Repositories\NotationRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RecetteRepository;
use App\Repositories\RecetteRepositoryInterface;
use App\Services\Interfaces\NotationServiceInterface;
use App\Services\NotationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RecetteRepositoryInterface::class, RecetteRepository::class);
        $this->app->bind(NotationRepositoryInterface::class, NotationRepository::class);
        $this->app->bind(NotationServiceInterface::class, NotationService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
