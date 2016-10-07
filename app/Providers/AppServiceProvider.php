<?php

namespace App\Providers;

use App\Domain\Book\BookRepository;
use App\Domain\Book\BookRepositoryInterface;
use App\Domain\Book\BookService;
use App\Domain\Book\BookServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BookServiceInterface::class, BookService::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
