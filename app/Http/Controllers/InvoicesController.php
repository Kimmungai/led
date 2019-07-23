<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Revenue;
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
      if( $request->filter  )
      {
        $sign ='=';$val=$request->status;
        $startDate = $request->start_date != null ? Carbon::create($request->start_date) : Carbon::create('1970-01-10');
        $endDate = $request->end_date != null ? Carbon::create($request->end_date) : Carbon::today();

        if( $val == -1 ){$sign ='<>';$val=null;}

        $invoices = Report::where('status',$sign,$val)->whereDate('created_at','>=',$startDate)->whereDate('created_at','<=',$endDate)->get();

      }else{
        $invoices = Report::all();
      }

      return view('invoice.index',compact('invoices'));
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
}
