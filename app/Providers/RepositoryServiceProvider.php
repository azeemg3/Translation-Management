<?php

namespace App\Providers;

use App\Interfaces\TranslateInterface;
use App\Repostries\TranslateRepository;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Translation\Reader\TranslationReaderInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TranslateInterface::class, TranslateRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
