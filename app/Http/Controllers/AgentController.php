<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreUser;

class AgentController extends Controller
{

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
      $agents = $this->getAgents();
      return view('agent.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.create');
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

        if( $this->createAgent($data) )
          Session::flash('message', env("SAVE_SUCCESS_MSG","Record saved succesfully!"));
        else
          Session::flash('error', env("SAVE_SUCCESS_MSG","Problem saving record! Ensure all details are correct and try again."));


        return redirect(route('agent.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $agent = $this->getAgent($id);
      return view('agent.show',compact('agent'));
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
        if( $this->updateAgent($id,$data) )
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
        $this->deleteAgent($id);
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record deleted succesfully!"));
        return redirect(route('agent.index'));
    }

    protected function getAgents()
    {
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/agent/');
      return json_decode($response->getBody()->getContents());
    }

    protected function deleteAgent($id)
    {
      $client = new Client();
      $response = $client->request('delete','http://34.91.134.230/api/agent/'.$id);
      return json_decode($response->getBody()->getContents());
    }

    protected function getAgent($id)
    {
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/agent/'.$id);
      return json_decode($response->getBody()->getContents());
    }

    protected function updateAgent($id,$data)
    {
      $client = new Client();
      $response = $client->request('PUT','http://34.91.134.230/api/agent/'.$id,['form_params'=>$data]);
      return $response->getBody()->getContents();
    }

    protected function createAgent($data)
    {
      $client = new Client();
      $response = $client->request('POST','http://34.91.134.230/api/agent/',['form_params'=>$data]);
      return $response->getBody()->getContents();
    }
}
