<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\UserTransactions;
use Illuminate\Http\Request;
use App\Sale;
use App\Report;
use App\User;

class PaymentsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_acc_bal = 0;
        $sale_id = session('sale_id');

        if( $sale_id )
        {
          $sale = Sale::find($sale_id);
          $user = User::find($sale->user_id);
          $user_acc_bal = $this->get_user_acc_bal($user);
        }

        return view('payment.create',compact('user_acc_bal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale_id = session('sale_id');
        $acc_bal = 0;

        if(!$sale_id){
          session(['soldProds' => []]);
          session(['salePrice' => 0]);
          Session::flash('error', env("SAVE_SUCCESS_MSG","An error occured! Please contact admin"));
          return redirect(route('home'));
        }

        $sale = Sale::find($sale_id);
        $user = User::find($sale->user_id);

        if( $request->paymentMethod != 1 )
        {
          if( $request->amountReceived > 0 ){
          $this->fundUserAcc( $request->amountReceived - abs($request->balance),$user->id);}
          $acc_bal = $this->get_user_acc_bal($user);
          $amountReceived = 0;
          if( $acc_bal >= $request->balance ){ $amountReceived = $request->balance;}

        }else{

          $amountReceived = $request->amountReceived;
        }

        if( $sale->amountDue <= $amountReceived ){$status = 1;}else{$status=0;}

        Sale::where('id',$sale_id)->update([
          'paymentMethod' => $request->paymentMethod,
          'amountReceived' => $amountReceived,
          'transacion_code' => $request->transacion_code,
          'cheque_no' => $request->cheque_no,
          'status' => $status,
        ]);

        //update user account
        if( $request->balance < 0 || $request->paymentMethod == 4){
          $debit = new UserTransactions;
          $debit->user_id = $sale->user_id;
          $debit->debit = abs($request->balance);
          $debit->save();
          if( $acc_bal <= $request->balance || $request->paymentMethod == 1 ){
            $this->create_invoice($user,$sale,$debit->debit,$name='invoice');
          }
        }
        /*else{
          $credit = new UserTransactions;
          $credit->user_id = $sale->user_id;
          //$credit->credit = $request->balance;
          $credit->save();
        }*/

        session(['soldProds' => []]);
        session(['salePrice' => 0]);
        session(['sale_id'=>'']);
        Session::flash('message', env("SAVE_SUCCESS_MSG","Payment recorded successfully!"));
        return redirect(route('sales.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserTransactions  $userTransactions
     * @return \Illuminate\Http\Response
     */
    public function show(UserTransactions $userTransactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTransactions  $userTransactions
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTransactions $userTransactions)
    {
        //
    }

    /**
     * Update the specified resourcecreate_invoice() in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTransactions  $userTransactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTransactions $userTransactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTransactions  $userTransactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTransactions $userTransactions)
    {
        //
    }

    private function create_invoice($user,$sale,$value,$name='invoice')
    {
      $invoice = new Report;
      $invoice->user_id = $user->id;
      $invoice->sale_id = $sale->id;
      $invoice->name = $name;
      $invoice->amount = abs($value);
      $invoice->totalAmount = $sale->amountDue;
      $invoice->recipient = $user->name;
      $invoice->send_to = $user->email;
      $invoice->save();
      return $invoice;
    }

    private function get_user_acc_bal($user)
    {
      $debit = 0;$credit=0;
      foreach ($user->UserTransactions as $transaction)
      {
        $debit += $transaction->debit;
        $credit += $transaction->credit;
      }

      return $credit - $debit;
    }

    private function fundUserAcc($amount,$user_id)
    {
      $credit = new UserTransactions;
      $credit->user_id = $user_id;
      $credit->credit = $amount;
      $credit->save();
    }
}
