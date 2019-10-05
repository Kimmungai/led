<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Report;
use App\Revenue;
use App\Sale;
use App\User;
use Carbon\Carbon;

class InvoicesController extends Controller
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

    public function index( Request $request )
    {

      $customers = User::where('type',env('CUSTOMER',2))->get();
      $customer_id =$customers[0]->id;

      if( $request->customer_id ){ $customer_id = $request->customer_id;}

      if( $request->filter  )
      {
        $sign ='=';$val=$request->status;
        $startDate = $request->start_date != null ? Carbon::create($request->start_date) : Carbon::create('1970-01-10');
        $endDate = $request->end_date != null ? Carbon::create($request->end_date) : Carbon::today();

        if( $val == -1 ){$sign ='<>';$val=null;}

        $invoices = Report::where('user_id',$customer_id)->where('status',$sign,$val)->whereDate('created_at','>=',$startDate)->whereDate('created_at','<=',$endDate)->orderBy('created_at','DESC')->paginate(20);

      }else{
        $invoices = Report::where('user_id',$customer_id)->orderBy('created_at','DESC')->paginate(20);
      }

      return view('invoice.index',compact('invoices','customers'));
    }

    public function create()
    {
        return view('invoice.create');
    }
    public function show($id)
    {
        $invoice = Report::find($id);
        $revenues = Revenue::where('sale_id',$invoice->sale_id)->get();
        return view('invoice.edit',compact('invoice','revenues'));
    }

    public function update_invoice(Request $request)
    {
      $id = $request->id;
      $field = $request->field;
      $value = $request->value;

      Report::where('id',$id)->update([
        $field => $value,
      ]);

      if( $request->sales ){
        $report = Report::find($id);
        $sale = Sale::find($report->sale_id);

        Sale::where('id',$sale->id)->update([
          $field => $value,
        ]);

      }
      return 1;
    }
    public function destroy_invoice(Request $request)
    {
      $report = Report::find($request->id);
      $report->delete();
      Session::flash('message', env("SAVE_SUCCESS_MSG","Invoice deleted succesfully!"));

      return redirect(route('invoices.index'));
    }

    public function edit_invoice( Request $request )
    {
      Session::flash('message', env("SAVE_SUCCESS_MSG","Invoice updated succesfully!"));
      return back();
    }
}
