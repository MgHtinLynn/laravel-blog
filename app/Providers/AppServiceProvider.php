<?php

namespace App\Providers;

use App\Services\Article\ArticleContracts;
use App\Services\Article\ArticleRepository;
use App\Services\Category\CategoryContracts;
use App\Services\Category\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ArticleContracts::class,ArticleRepository::class);
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
