<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class SettingsCostsController extends Controller
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
        $costs = $this->getCost();
        return view('costs.index',compact('costs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate([
          'meta' => 'required|numeric',
          'meta_val' => 'required|numeric',
        ]);
        $data = $request->only(['meta','meta_val']);
        $data['name'] = 'advertisingCosts';
        $data['type'] = 'advertisingCosts';

        if( $this->updateCost($id,$data) )
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
        //
    }

    protected function updateCost($id,$data)
    {
      $client = new Client();
      $response = $client->request('PUT','http://192.248.160.159/api/advertising-costs/'.$id,['form_params'=>$data]);
      return $response->getBody()->getContents();
    }

    protected function getCost()
    {
      $client = new Client();
      $response = $client->request('GET','http://192.248.160.159/api/advertising-costs/');
      return json_decode($response->getBody()->getContents());
    }
}
