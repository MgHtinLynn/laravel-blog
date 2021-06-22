<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Link;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $dashboard = Link::to(route('dashboard'),
                '<i class="fa fa-tachometer text-dark c-sidebar-nav-icon" aria-hidden="true"></i>Dashboard')
                ->addClass('c-sidebar-nav-link text-center')
                ->addParentClass('c-sidebar-nav-item');

            $menu = Menu::new()
                ->addClass('c-sidebar-nav')
                ->add($dashboard);


            $view->with('menu', $menu);
        });
    }

}
