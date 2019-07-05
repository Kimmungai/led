<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        $tabs = $this->dashicons();
        View::share('tabs',$tabs);
    }

    protected function dashicons()
    {
      return [
         collect(['name'=>'Profits', 'icon' => 'fa fa-chart-line','class'=>'grow']),
         collect(['name'=>'Sales', 'icon' => 'fa fa-tags','class'=>'grow1','link'=>'#']),
         collect(['name'=>'Purchases', 'icon' => 'fa fa-clipboard-check','class'=>'grow3','link'=>'#']),
         collect(['name'=>'Stock', 'icon' => 'fa fa-clipboard-list','class'=>'grow2','link'=>'#']),
         //collect(['name'=>'New sale', 'icon' => 'fa fa-plus-circle','class'=>'grow4']),
         //collect(['name'=>'New Purchase', 'icon' => 'fa fa-plus-circle','class'=>'grow4']),
      ];
    }
}
