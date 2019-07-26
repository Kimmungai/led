<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Ireport;
use App\Report;
use App\IreportInvoices;
use Illuminate\Http\Request;

class IreportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Ireport::orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',4));
        return view('Ireport.index',compact('reports'));
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
      $ireport = new Ireport;
      $ireport->start_date = $request->start_date;
      $ireport->end_date = $request->end_date;
      $ireport->save();

      if( $request->invoice_id )
      {
        //generate report from specific invoices
        foreach ( $request->invoice_id as $invoice_id )
        {
          $invoice = Report::find($invoice_id);
          $ireportInvoice = new IreportInvoices;
          $ireportInvoice->ireport_id = $ireport->id;
          $ireportInvoice->invoice_id = $invoice->id;
          $ireportInvoice->invoice_date = $invoice->created_at;
          $ireportInvoice->recipient = $invoice->recipient;
          $ireportInvoice->amount = $invoice->amount;
          $ireportInvoice->totalAmount = $invoice->totalAmount;
          $ireportInvoice->save();
        }
      }
      else
      {
        // generate report from all invoices
        $invoices = Report::all();
        foreach ( $invoices as $invoice )
        {
          $ireportInvoice = new IreportInvoices;
          $ireportInvoice->ireport_id = $ireport->id;
          $ireportInvoice->invoice_id = $invoice->id;
          $ireportInvoice->invoice_date = $invoice->created_at;
          $ireportInvoice->recipient = $invoice->recipient;
          $ireportInvoice->amount = $invoice->amount;
          $ireportInvoice->totalAmount = $invoice->totalAmount;
          $ireportInvoice->save();
        }
      }

      Session::flash('message', env("SAVE_SUCCESS_MSG","Report generated successfully!"));

      return redirect(route('report.show',$ireport->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ireport  $ireport
     * @return \Illuminate\Http\Response
     */
    public function show(Ireport $ireport,$id)
    {
        $ireport = Ireport::find($id);
        return view('Ireport.edit',compact('ireport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ireport  $ireport
     * @return \Illuminate\Http\Response
     */
    public function edit(Ireport $ireport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ireport  $ireport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ireport $ireport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ireport  $ireport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ireport $ireport,$id)
    {
        $ireport = Ireport::find($id);
        if($ireport->IreportInvoices)
        {
          foreach ($ireport->IreportInvoices as $invoice)
          {
            $invoice->delete();
          }
        }
        $ireport->delete();
        Session::flash('message', env("SAVE_SUCCESS_MSG","Report deleted successfully!"));
        return redirect(route('report.index'));

    }
}
