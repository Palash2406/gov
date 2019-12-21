<?php

namespace App\Providers;


use App\Menu;
use App\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
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
        //

        if (Schema::hasTable('menus')&&Schema::hasTable('sliders')) {
            // Code to create table
            $data = Menu::all();
            $sliders=Slider::all();

            \Illuminate\Support\Facades\View::share(['global_menus'=> $data,'sliders'=>$sliders]);

        }


    }
}
