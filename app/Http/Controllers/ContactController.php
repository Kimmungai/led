<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
class ContactController extends Controller
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
      $contacts = $this->getContacts();
      return view('contact.index',compact('contacts'));
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
      $data['page'] = 'contact';
      $data['type'] = 'contacts';
      if( $this->createContact($data) )
        Session::flash('message', env("SAVE_SUCCESS_MSG","Record saved succesfully!"));
      else
        Session::flash('error', env("SAVE_SUCCESS_MSG","Problem saving record! Ensure all details are correct and try again."));


      return redirect(route('contact.index'));
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
        'name' => 'required',
        'value' => 'required',
      ]);

      $data = $request->except(['_token','_method']);
      $data['page'] = 'contact';
      $data['type'] = 'contacts';
      if( $this->updateFaq($id,$data) )
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
      if( $this->deleteContact($id) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record deleted succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem deleting record! Ensure all details are correct and try again."));

      return redirect(route('contact.index'));
    }

    protected function getContacts()
    {
      $contact = new Client();
      $response = $contact->request('GET','http://192.248.160.159/api/contact/');
      return json_decode($response->getBody()->getContents());
    }

    protected function createContact($data)
    {
      $contact = new Client();
      $response = $contact->request('POST','http://192.248.160.159/api/contact/',['form_params'=>$data]);
      return $response->getBody()->getContents();
    }

    protected function updateFaq($id,$data)
    {
      $contact = new Client();
      $response = $contact->request('PUT','http://192.248.160.159/api/contact/'.$id,['form_params'=>$data]);
      return json_decode($response->getBody()->getContents());
    }

    protected function deleteContact($id)
    {
      $contact = new Client();
      $response = $contact->request('delete','http://192.248.160.159/api/contact/'.$id);
      return $response->getBody()->getContents();
    }
}
