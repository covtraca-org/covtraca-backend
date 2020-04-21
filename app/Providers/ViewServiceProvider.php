<?php

namespace App\Providers;

use App\User;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['records.fields'], function ($view) {
            $userItems = User::orderBy('created_at', 'desc')->pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });        
    }
}
