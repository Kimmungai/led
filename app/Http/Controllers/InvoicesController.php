<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Revenue;

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
    
    public function index()
    {
      $invoices = Report::all();

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
