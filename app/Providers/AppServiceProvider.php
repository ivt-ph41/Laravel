<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = [
            ['name' => 'apple'],
            ['name' => 'samsung']
        ];
        $abc=10;
        // view()->share('categories', $categories );
        view()->composer(['forgot-pass', 'home.*'], function($view)  use ($categories, $abc) {
            // $categories = [
            //     ['name' => 'apple'],
            //     ['name' => 'samsung']
            // ];
            $view->with('categories', $categories);
        });
    }
}
