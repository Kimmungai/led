<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $payments = $this->getPayments();
      return view('payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
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

      if( $this->createPayment($data) )
        Session::flash('message', env("SAVE_SUCCESS_MSG","Record saved succesfully!"));
      else
        Session::flash('error', env("SAVE_SUCCESS_MSG","Problem saving record! Ensure all details are correct and try again."));


      return redirect(route('payment.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $payment = $this->getPayment($id);
      return view('payment.show',compact('payment'));
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
        if( $this->updatePayment($id,$data) )
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
      if( $this->deletePayment($id) )
        Session::flash('message', env("DELETE_SUCCESS_MSG","Record deleted succesfully!"));
      else
        Session::flash('error', env("DELETE_SUCCESS_MSG","Problem deleting record! Ensure all details are correct and try again."));

      return redirect(route('payment.index'));
    }

    protected function getPayments()
    {
      $payment = new Client();
      $response = $payment->request('GET','http://192.248.160.159/api/payment/');
      return json_decode($response->getBody()->getContents());
    }

    protected function getPayment($id)
    {
      $payment = new Client();
      $response = $payment->request('GET','http://192.248.160.159/api/payment/'.$id);
      return json_decode($response->getBody()->getContents());
    }

    protected function updatePayment($id,$data)
    {
      $payment = new Client();
      $response = $payment->request('PUT','http://192.248.160.159/api/payment/'.$id,['form_params'=>$data]);
      return $response->getBody()->getContents();
    }

    protected function deletePayment($id)
    {
      $client = new Client();
      $response = $client->request('delete','http://192.248.160.159/api/payment/'.$id);
      return $response->getBody()->getContents();
    }

    protected function createPayment($data)
    {
      $client = new Client();
      $response = $client->request('POST','http://192.248.160.159/api/payment/',['form_params'=>$data]);
      return $response->getBody()->getContents();
    }
}
