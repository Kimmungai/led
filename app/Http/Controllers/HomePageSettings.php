<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
class HomePageSettings extends Controller
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
      $data['page'] = 'home';
      $data['type'] = 'homes';
      $homeSettings = $this->getPageSettings($data);
      return view('home-page.index',compact('homeSettings'));
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
      $request->validate([
        'name' => 'required',
        'value' => 'required',
      ]);

      $data = $request->except(['_token']);
      $data['page'] = 'home';
      $data['type'] = 'homes';
      if( $this->createPageSetting($data) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record saved succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem saving record! Ensure all details are correct and try again."));


      return redirect(route('home-page.index'));
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
      $data = $request->except(['_token','_method']);
      $data['page'] = 'home';
      $data['type'] = 'homes';
      if( $this->updatePageSetting($id,$data) )
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
      if( $this->deletePageSetting($id) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record deleted succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem deleting record! Ensure all details are correct and try again."));

      return redirect(route('home-page.index'));
    }

    protected function getPageSettings($data)
    {
      $home = new Client();
      $response = $home->request('POST','http://192.248.160.159/api/settings-retrieve/',['form_params'=>$data]);
      return json_decode($response->getBody()->getContents());
    }

    protected function createPageSetting($data)
    {
      $client = new Client();
      $response = $client->request('POST','http://192.248.160.159/api/settings/',['form_params'=>$data]);
      return $response->getBody()->getContents();
    }

    protected function deletePageSetting($id)
    {
      $faq = new Client();
      $response = $faq->request('delete','http://192.248.160.159/api/settings/'.$id);
      return $response->getBody()->getContents();
    }

    protected function updatePageSetting($id,$data)
    {
      $faq = new Client();
      $response = $faq->request('PUT','http://192.248.160.159/api/settings/'.$id,['form_params'=>$data]);
      return json_decode($response->getBody()->getContents());
    }

}
