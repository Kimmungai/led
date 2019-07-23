<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Sale;
use App\Product;
use App\Inventory;
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
        $sales = Sale::orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',4));
        return view('sale.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( session('prodType') != null ){ $type = session('prodType'); }else{$type=0;}//active tab is all
        if( $type ){
          $products = Product::where('type',$type)->paginate(env('ITEMS_PER_PAGE',3));
        }else{
          $products = Product::paginate(env('ITEMS_PER_PAGE',3));
        }
        $customers = User::where('type',env('CUSTOMER',2))->get();
        return view('sale.create',compact('products','customers','type'));
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
        $product = Product::find($soldProd['id']);
        $revenue = new Revenue;
        $revenue->sale_id = $sale->id;
        $revenue->product_id = $product->id;
        $revenue->soldQuantity = $soldProd['qty'];
        $revenue->description = $product->name." ".$product->description;
        $revenue->unitPrice = $product->cost;
        $revenue->sellingPrice = $product->cost;
        $revenue->save();

        $prodNewQuantity = $product->inventory->availableQuantity - $soldProd['qty'];

        //update quantity
        Inventory::where('product_id',$product->id)->update([
          'availableQuantity' => $prodNewQuantity,
        ]);

      }

      session( [ 'sale_id' => $sale->id ] );

      //session(['soldProds' => []]);
      //session(['salePrice' => 0]);

      Session::flash('message', env("SAVE_SUCCESS_MSG","Saved succesfully!"));


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
