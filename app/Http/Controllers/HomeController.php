<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Org;
use App\Sale;
use App\Purchase;
use App\Inventory;
use App\Report;
use GuzzleHttp\Client;
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
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/agent/');
      $data = json_decode($response->getBody()->getContents());

      $sales = Sale::all();
      $purchases = $data;
      $inventory = Inventory::where('availableQuantity','<>',0)->get();
      $invoices = Report::all();
      return [
         collect(['name'=>'New agents', 'icon' => 'fa fa-users','class'=>'grow','link'=>url('/agent'),'model'=>$purchases]),
         collect(['name'=>'New clients', 'icon' => 'fa fa-user-check','class'=>'grow','link'=>route('stock.index'),'model'=>$inventory]),
         collect(['name'=>'Sales', 'icon' => 'fa fa-tags','class'=>'grow','link'=>route('sales.index'),'model'=>$sales]),
         collect(['name'=>'Invoices', 'icon' => 'fa fa-file-invoice','class'=>'grow','link'=>route('invoices.index'),'model'=>$invoices]),
      ];
    }

    public function save_list(Request $request)
    {
      session(['list' => $request->list]);
      session(['totalCost' => $request->totalCost]);

    }
}
