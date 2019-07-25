<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Revenue;
use App\Sale;
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

        $invoices = Report::where('status',$sign,$val)->whereDate('created_at','>=',$startDate)->whereDate('created_at','<=',$endDate)->orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',3));

      }else{
        $invoices = Report::orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',4));
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
    }
}
