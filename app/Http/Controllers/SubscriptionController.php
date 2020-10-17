<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subscriptions = $this->getSubscriptions();
      return view('subscription.index',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->except(['_token']);
      $data['features'] = explode(PHP_EOL, $data['features']);
      if( $this->createSubscription($data) )
        Session::flash('message', env("SAVE_SUCCESS_MSG","Record saved succesfully!"));
      else
        Session::flash('error', env("SAVE_SUCCESS_MSG","Problem saving record! Ensure all details are correct and try again."));


      return redirect(route('subscription.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $subscription = $this->getSubscription($id);
      return view('subscription.show',compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->except(['_token','_method']);
      $data['features'] = explode(PHP_EOL, $data['features']);
      if( $this->updateSubscription($id,$data) )
        Session::flash('message', env("SAVE_SUCCESS_MSG","Record updated succesfully!"));
      else
        Session::flash('error', env("SAVE_SUCCESS_MSG","Problem updating record! Ensure all details are correct and try again."));

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if( $this->deleteSubscription($id) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record deleted succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem deleting record! Ensure all details are correct and try again."));

      return redirect(route('subscription.index'));
    }

    protected function getSubscriptions()
    {
      $subscription = new Client();
      $response = $subscription->request('GET','http://localhost:8001/api/package/');
      return json_decode($response->getBody()->getContents());
    }

    protected function createSubscription($data)
    {
      $subscription = new Client();
      $response = $subscription->request('POST','http://localhost:8001/api/package/',['form_params'=>$data]);
      return $response->getBody()->getContents();
    }

    protected function getSubscription($id)
    {
      $subscription = new Client();
      $response = $subscription->request('GET','http://localhost:8001/api/package/'.$id);
      return json_decode($response->getBody()->getContents());
    }

    protected function updateSubscription($id,$data)
    {
      $subscription = new Client();
      $response = $subscription->request('PUT','http://localhost:8001/api/package/'.$id,['form_params'=>$data]);
      return $response->getBody()->getContents();
    }

    protected function deleteSubscription($id)
    {
      $client = new Client();
      $response = $client->request('delete','http://localhost:8001/api/package/'.$id);
      return $response->getBody()->getContents();
    }
}
