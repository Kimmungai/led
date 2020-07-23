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
        $todayListingStats = $this->getTodayListingStats();
        return view('home',compact('tabs','todayListingStats'));
    }

    protected function dashicons()
    {


      $sales = $this->getPayments();
      $agents = $this->getAgents();
      $clients = $this->getClients();
      $invoices = Report::all();
      return [
         collect(['name'=>'New agents', 'icon' => 'fa fa-users','class'=>'grow','link'=>url('/agent'),'model'=>$agents]),
         collect(['name'=>'New clients', 'icon' => 'fa fa-user-check','class'=>'grow','link'=>url('/client'),'model'=>$clients]),
         collect(['name'=>'Sales', 'icon' => 'fa fa-tags','class'=>'grow','link'=>'#','model'=>'KES '.number_format($sales,2),'printAsIs'=>true]),
         collect(['name'=>'Invoices', 'icon' => 'fa fa-file-invoice','class'=>'grow','link'=>route('invoices.index'),'model'=>$invoices]),
      ];
    }

    public function save_list(Request $request)
    {
      session(['list' => $request->list]);
      session(['totalCost' => $request->totalCost]);

    }

    protected function getAgents()
    {
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/agent/');
      return json_decode($response->getBody()->getContents());
    }

    protected function getClients()
    {
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/user/');
      return json_decode($response->getBody()->getContents());
    }

    protected function getPayments()
    {
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/payment/');
      return $response->getBody()->getContents();
    }

    protected function getTodayListingStats()
    {
      $client = new Client();
      $response = $client->request('POST','http://34.91.134.230/api/listing-today-stats/');
      $data = json_decode($response->getBody()->getContents());
      $todayListingStats['commercial'] = $data->commercial;
      $todayListingStats['residential'] = $data->residential;
      $todayListingStats['agricultural'] = $data->agricultural;
      $todayListingStats['industrial'] = $data->industrial;
      return $todayListingStats;
    }
}
