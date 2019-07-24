<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Report;
use App\Quote;
use App\QuoteProds;
use Illuminate\Http\Request;

class QuotationsController extends Controller
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
        return view('report.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['product_id','_token']);
        $prodIDs = $request->product_id;

        $quote = Quote::create($data);

        foreach ($prodIDs as $prodID)
        {
          $newQuoteProd = new QuoteProds;
          $newQuoteProd->product_id = $prodID;
          $newQuoteProd->quote_id = $quote->id;
          $newQuoteProd->save();
        }

        Session::flash('message', env("SAVE_SUCCESS_MSG","Quote saved succesfully!"));
        return redirect(route('quotation.show',$quote->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report,$id)
    {
        $quote = Quote::find($id);
        return view('report.edit',compact('quote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
