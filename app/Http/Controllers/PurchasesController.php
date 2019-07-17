<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Org;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchase.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodRegMainFields = $this->product_reg_main_fields();
        $prodRegSideFields = $this->product_reg_side_fields();
        $orgs = Org::all();

        return view('purchase.create',compact('orgs','prodRegMainFields','prodRegSideFields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    /**
     * create main fields of a product registration form.
     * @return $prodRegMainFields
     */
    private function product_reg_main_fields()
    {
        return  [
          'name' => ['title' => 'Name','name' => 'name', 'id' => 'name', 'type' => 'text','icon' => 'fas fa-gift', 'placeholder' => 'Product name','min'=>'','click'=>'','required'=>true],
          'sku' => ['title' => 'SKU','name' => 'sku', 'id' => 'sku', 'type' => 'text','icon' => 'fas fa-store', 'placeholder' => 'Product sku','min'=>'','click'=>'','required'=>true],
          'cost' => ['title' => 'Cost','name' => 'cost', 'id' => 'cost', 'type' => 'number','icon' => 'fas fa-money-bill', 'placeholder' => 'Product cost','min'=>0,'click'=>'','required'=>true],
          'Qty' => ['title' => 'Qty','name' => 'suppliedQuantity', 'id' => 'suppliedQuantity', 'type' => 'number','icon' => 'fas fa-info-circle', 'placeholder' => 'Supplied quantity','min'=>0,'click'=>'','required'=>true],
          'remarks' => ['title' => 'Remarks','name' => 'description', 'id' => 'description', 'type' => 'textarea','icon' => 'fas fa-info-circle', 'placeholder' => 'Enter any description about this product','min'=>'','rows'=>5,'click'=>'','required'=>false],

        ];
    }

    /**
     * create side fields of a product registration form.
     * @return $prodRegSideFields
     */
    private function product_reg_side_fields()
    {
      return  [
        'name' => ['title' => 'Weight','name' => 'weight', 'id' => 'weight', 'type' => 'number','icon' => 'fas fa-info-circle', 'placeholder' => 'Weight','min'=>0.00,'click'=>'','required'=>false],
        'color' => ['title' => 'Color','name' => 'color', 'id' => 'color', 'type' => 'text','icon' => 'fas fa-info-circle', 'placeholder' => 'Color','min'=>'','click'=>'','required'=>false],
        'height' => ['title' => 'Height','name' => 'height', 'id' => 'height', 'type' => 'number','icon' => 'fas fa-info-circle', 'placeholder' => 'Height','min'=>'','click'=>'','required'=>false],
      ];
    }
}
