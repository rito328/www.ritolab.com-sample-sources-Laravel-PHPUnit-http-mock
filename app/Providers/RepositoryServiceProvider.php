<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Services\BookDataAccess::class, function($app) {
            // MySQLリポジトリ
            return new \App\Repositories\BookMysqlRepository(new \App\Book);
            // SQLiteリポジトリ
            //return new \App\Repositories\BookSqliteRepository(new \App\Book);
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
