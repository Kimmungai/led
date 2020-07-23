<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreUser;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clients = $this->getClients();
      return view('client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
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

      if( $this->createClient($data) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record saved succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem saving record! Ensure all details are correct and try again."));


      return redirect(route('client.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $client = $this->getClient($id);
      return view('client.show',compact('client'));
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
      if( $this->updateClient($id,$data) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record updated succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem updating record! Ensure all details are correct and try again."));

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
      $this->deleteUser($id);
      Session::flash('message', env("DELETE_SUCCESS_MSG","Record deleted succesfully!"));
      return redirect(route('client.index'));
    }

    protected function getClients()
    {
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/user/');
      return json_decode($response->getBody()->getContents());
    }

    protected function getClient($id)
    {
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/user/'.$id);
      return json_decode($response->getBody()->getContents());
    }

    protected function updateClient($id,$data)
    {
      $client = new Client();
      $response = $client->request('PUT','http://34.91.134.230/api/user/'.$id,['form_params'=>$data]);
      return $response->getBody()->getContents();
    }

    protected function deleteUser($id)
    {
      $client = new Client();
      $response = $client->request('delete','http://34.91.134.230/api/user/'.$id);
      return json_decode($response->getBody()->getContents());
    }

    protected function createClient($data)
    {
      $client = new Client();
      $response = $client->request('POST','http://34.91.134.230/api/user/',['form_params'=>$data]);
      return $response->getBody()->getContents();
    }
}
