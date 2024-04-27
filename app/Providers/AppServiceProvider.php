<?php

namespace App\Providers;

use App\Models\Slider;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $settings = Setting::first();
        // view()->share('setting', $settings);


        // for multiple data send
        view()->composer('*', function($view)
        {
            $settings = Setting::first();
            $slider_data= Slider::first();
            $view->with(['setting'=> $settings,
                
                'slider_data'=> $slider_data]);
        });
    }
}
