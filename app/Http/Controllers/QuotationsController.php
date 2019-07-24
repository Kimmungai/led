<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Report;
use App\Product;
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
        $quotes = Quote::orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',4));
        return view('report.all',compact('quotes'));
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
          $product = Product::find($prodID);
          if(!$product){continue;}
          $newQuoteProd = new QuoteProds;
          $newQuoteProd->product_id = $prodID;
          $newQuoteProd->quote_id = $quote->id;
          $newQuoteProd->name = $product->name;
          $newQuoteProd->salePrice = $product->salePrice;
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
    public function update(Request $request, Report $report, $id)
    {
      $data = $request->except(['product_id','_token','_method']);
      $prodIDs = $request->product_id;

      Quote::where('id',$id)->update($data);

      QuoteProds::where('quote_id',$id)->delete();

      foreach ($prodIDs as $prodID)
      {
        $product = Product::find($prodID);
        if(!$product){continue;}
        $newQuoteProd = new QuoteProds;
        $newQuoteProd->product_id = $prodID;
        $newQuoteProd->quote_id = $id;
        $newQuoteProd->name = $product->name;
        $newQuoteProd->salePrice = $product->salePrice;
        $newQuoteProd->save();
      }

      Session::flash('message', env("SAVE_SUCCESS_MSG","Updated succesfully!"));
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report, $id)
    {
        $quote = Quote::find($id);
        if($quote->quoteProds)
        {
          foreach ($quote->quoteProds as $quoteProd) {
            $quoteProd->delete();
          }
        }

        Session::flash('message', env("SAVE_SUCCESS_MSG","Quote deleted succesfully!"));

        $quote->delete();

        return redirect(route('quotation.index'));
    }
}
