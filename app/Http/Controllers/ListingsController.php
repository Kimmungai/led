<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listings = $this->getListings();
      return view('listing.index',compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = $this->getAgents();
        return view('listing.create',compact('agents'));
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

      if( $this->createListing($data) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record saved succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem saving record! Ensure all details are correct and try again."));


      return redirect(route('listing.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $listing = $this->getListing($id);
      return view('listing.show',compact('listing'));
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
      if( $this->updateListing($id,$data) )
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
      if( !$this->deleteListing($id) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record deleted succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem deleting record! Ensure all details are correct and try again."));

      return redirect(route('listing.index'));
    }

    protected function getListings()
    {
      $listing = new Client();
      $response = $listing->request('GET','http://34.91.134.230/api/listing/');
      return json_decode($response->getBody()->getContents());
    }

    protected function getListing($id)
    {
      $listing = new Client();
      $response = $listing->request('GET','http://34.91.134.230/api/listing/'.$id);
      return json_decode($response->getBody()->getContents());
    }

    protected function updateListing($id,$data)
    {
      $payment = new Client();
      $response = $payment->request('PUT','http://34.91.134.230/api/listing/'.$id,['form_params'=>$data]);
      return json_decode($response->getBody()->getContents());
    }

    protected function deleteListing($id)
    {
      $client = new Client();
      $response = $client->request('delete','http://34.91.134.230/api/listing/'.$id);
      return $response->getBody()->getContents();
    }

    protected function createListing($data)
    {
      $client = new Client();
      $response = $client->request('POST','http://34.91.134.230/api/listing/',['form_params'=>$data]);
      return json_decode($response->getBody()->getContents());
    }

    protected function getAgents()
    {
      $client = new Client();
      $response = $client->request('GET','http://34.91.134.230/api/agent/');
      return json_decode($response->getBody()->getContents());
    }


}
