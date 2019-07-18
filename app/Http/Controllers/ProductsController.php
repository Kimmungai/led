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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(env('ITEMS_PER_PAGE',3));
        return view('stock.index',compact('products'));
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
        //$expense = $request->only(['cost','suppliedQuantity']);
        //$expense['product_id'] = $product->id;
        //$newExpence = Expense::create($expense);
        $variation = $request->only(['weight','height','color']);
        $variation['product_id'] = $product->id;
        Variation::create($variation);
        $inventory['availableQuantity'] =  $request->suppliedQuantity;
        $inventory['product_id'] = $product->id;
        Inventory::create($inventory);
        Session::flash('message', env("SAVE_SUCCESS_MSG","Product saved succesfully!"));
        Session::flash('newProduct',$product);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
