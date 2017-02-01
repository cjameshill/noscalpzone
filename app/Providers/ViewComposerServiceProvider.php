<?php

namespace App\Providers;

use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view){

            if(request()->route()->getPrefix()){
                $page = null;
            }

            $page = request()->route()->getPrefix();

            $view->with(['page' => $page]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
