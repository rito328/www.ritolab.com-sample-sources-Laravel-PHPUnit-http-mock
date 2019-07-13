<?php

namespace App\Providers;

use App\Services\BookService;
use App\Services\BookDataAccess;
use Illuminate\Support\ServiceProvider;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('BookService', function($app) {
            return new BookService(new BookDataAccess, new \App\Entities\BookList);
        });
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
