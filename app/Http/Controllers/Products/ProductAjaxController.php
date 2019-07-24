<?php

namespace App\Http\Controllers\Products;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Inventory;
use App\User;

class ProductAjaxController extends Controller
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

    public function get_product(Request $request)
    {
      $request->validate(['id'=>'required|numeric']);
      $prodID = $request->id;
      $product = Product::find($prodID);
      return $product;
    }

    public function get_product_type($type)
    {
      session(['prodType' => $type]);
      return redirect(route('stock.index'));
    }

    public function get_sale_product_type($type)
    {
      session(['prodType' => $type]);
      return redirect(route('sales.create'));
    }

    public function search_products(Request $request)
    {
      $products = Product::where('id', 'LIKE' ,$request->prod_cod.'%' )->get();
      return $products;
    }

    public function update_product(Request $request)
    {
      $request->validate([
        'id' => 'required|numeric',
        'salePrice' => 'nullable|numeric',
        'name' => 'nullable|max:255',
        'availableQuantity' => 'nullable|numeric',
      ]);

      if( $request->field == 'salePrice' || $request->field == 'name' )
      {
        Product::where('id',$request->id)->update([
          $request->field => $request->value,
        ]);
      }
      if($request->field == 'availableQuantity')
      {
        Inventory::where('product_id',$request->id)->update([
          $request->field => $request->value,
        ]);
      }
      return   1;
    }
}
