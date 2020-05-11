<?php

namespace App\Providers;
use App\Models\Device;
use App\Models\Question;

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
        View::composer(['reports.fields'], function ($view) {
            $deviceItems = Device::pluck('uid','id');
            $deviceItems->prepend("None", null);            
            $view->with('deviceItems', $deviceItems->toArray());
        });
        View::composer(['reports.fields'], function ($view) {
            $questionItems = Question::pluck('title','id')->toArray();
            $view->with('questionItems', $questionItems);
        });
    }
}
