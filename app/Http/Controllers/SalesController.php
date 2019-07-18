<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Sale;
use App\Product;
use App\User;
use App\Revenue;
use Illuminate\Http\Request;

class SalesController extends Controller
{
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
        return view('sale.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::paginate(env('ITEMS_PER_PAGE',3));
        $customer = User::where('type',env('CUSTOMER',2))->first();
        return view('sale.create',compact('products','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $sale = new Sale;
      $sale->user_id = $request->user_id;
      $sale->amountDue = session('salePrice');
      $sale->save();

      $soldProds = [];
      if( session('soldProds') != null) {$soldProds = session('soldProds');}

      foreach ($soldProds as $soldProd) {
        $revenue = new Revenue;
        $revenue->sale_id = $sale->id;
        $revenue->product_id = $soldProd['id'];
        $revenue->soldQuantity = $soldProd['qty'];
        $revenue->save();
      }



      //session(['soldProds' => []]);
      //session(['salePrice' => 0]);

      Session::flash('message', env("SAVE_SUCCESS_MSG","Sale recorded succesfully!"));


      return redirect(route('payments.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function save_cart_list(Request $request)
    {
      session(['soldProds' => $request->soldProds]);
      session(['salePrice' => $request->salePrice]);
      return 1;
    }
}
