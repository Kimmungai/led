<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Org;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tabs = $this->dashicons();
        return view('home',compact('tabs'));
    }

    protected function dashicons()
    {
      return [
         collect(['name'=>'Profits', 'icon' => 'fa fa-chart-line','class'=>'grow']),
         collect(['name'=>'Sales', 'icon' => 'fa fa-tags','class'=>'grow1','link'=>route('sales.index')]),
         collect(['name'=>'Purchases', 'icon' => 'fa fa-clipboard-check','class'=>'grow3','link'=>route('purchases.index')]),
         collect(['name'=>'Stock', 'icon' => 'fa fa-clipboard-list','class'=>'grow2','link'=>route('stock.index')]),
      ];
    }
}
