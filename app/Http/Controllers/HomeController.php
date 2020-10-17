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


      $sales = $this->getTodayPaymentStats()['totalSales'];
      $agents = $this->getAgents();
      $clients = $this->getClients();
      $wallets = $this->getTodayPaymentStats()['walletsTotal'];
      return [
         collect(['name'=>'New agents', 'icon' => 'fa fa-users','class'=>'grow','link'=>url('/agent'),'model'=>$agents]),
         collect(['name'=>'New clients', 'icon' => 'fa fa-user-check','class'=>'grow','link'=>url('/client'),'model'=>$clients]),
         collect(['name'=>'Sales', 'icon' => 'fa fa-tags','class'=>'grow','link'=>route('payment.index'),'model'=>'KES '.number_format($sales,2),'printAsIs'=>true]),
         collect(['name'=>'Wallets', 'icon' => 'fa fa-wallet','class'=>'grow','link'=>"#",'model'=>'KES '.number_format($wallets,2),'printAsIs'=>true]),
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
      $response = $client->request('GET','http://192.248.160.159/api/agent/');
      return json_decode($response->getBody()->getContents());
    }

    protected function getClients()
    {
      $client = new Client();
      $response = $client->request('GET','http://192.248.160.159/api/user/');
      return json_decode($response->getBody()->getContents());
    }

    protected function getPayments()
    {
      $client = new Client();
      $response = $client->request('GET','http://192.248.160.159/api/payment/');
      return $response->getBody()->getContents();
    }

    protected function getTodayListingStats()
    {
      $client = new Client();
      $response = $client->request('POST','http://192.248.160.159/api/listing-today-stats/');
      $data = json_decode($response->getBody()->getContents());
      $todayListingStats['commercial'] = $data->commercial;
      $todayListingStats['residential'] = $data->residential;
      $todayListingStats['agricultural'] = $data->agricultural;
      $todayListingStats['industrial'] = $data->industrial;
      return $todayListingStats;
    }

    protected function getTodayPaymentStats()
    {
      $client = new Client();
      $response = $client->request('POST','http://192.248.160.159/api/payment-today-stats/');
      $data = json_decode($response->getBody()->getContents());
      $todayPaymentStats['totalSales'] = $data->totalSales;
      $todayPaymentStats['walletsTotal'] = $data->walletsTotal;
      return $todayPaymentStats;
    }
}
