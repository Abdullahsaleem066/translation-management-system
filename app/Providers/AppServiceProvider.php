<?php

namespace App\Providers;

use App\Services\LocaleService;
use App\Services\TranslationService;
use App\Repositories\LocaleRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\LocaleServiceInterface;
use App\Repositories\TranslationRepository;
use App\Services\TranslationServiceInterface;
use App\Repositories\LocaleRepositoryInterface;
use App\Repositories\TranslationRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LocaleServiceInterface::class, LocaleService::class);
        $this->app->bind(LocaleRepositoryInterface::class, LocaleRepository::class);
        $this->app->bind(TranslationServiceInterface::class, TranslationService::class);
        $this->app->bind(TranslationRepositoryInterface::class, TranslationRepository::class);
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
