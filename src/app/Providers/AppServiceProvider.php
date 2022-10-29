<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public $singletons = [
        // リポジトリークラス
        \App\Contracts\Repositories\User::class => \App\Repositories\User::class,

        // サービスクラス
        \App\Contracts\Services\User::class => \App\Services\User::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

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
