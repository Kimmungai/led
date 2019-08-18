<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Expense;
use App\Variation;
use App\Inventory;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
      if( session('prodType') != null ){ $type = session('prodType'); }else{$type=0;}//active tab is all
      if( $type ){
        $products = Product::orderBy('created_at','DESC')->where('type',$type)->paginate(env('ITEMS_PER_PAGE',3));
      }else{
        $products = Product::orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',3));
      }
        return view('stock.index',compact('products','type'));
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
    public function store(StoreProduct $request)
    {
        $expenseList = [];
        $product = Product::create($request->only(['name','sku','img1','description','cost','type']));
        $product->update(['salePrice' => $request->cost]);
        //$expense = $request->only(['cost','suppliedQuantity']);
        //$expense['product_id'] = $product->id;
        //$newExpence = Expense::create($expense);
        $variation = $request->only(['weight','height','color']);
        $variation['product_id'] = $product->id;
        Variation::create($variation);
        
        $inventory['product_id'] = $product->id;
        Inventory::create($inventory);
        Session::flash('message', env("SAVE_SUCCESS_MSG","Product saved succesfully!"));
        Session::flash('newProduct',$product);
        session(['newProductQty' => $request->suppliedQuantity]);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $product)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,$id)
    {
        $product = Product::find($id);
        if($product->Inventory){$product->Inventory->delete();}
        if($product->Variation){$product->Variation->delete();}
        $product->delete();
        Session::flash('message', env("SAVE_SUCCESS_MSG","Product deleted succesfully!"));
        return back();
    }
}
