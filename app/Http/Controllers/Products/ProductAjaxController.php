<?php

namespace App\Http\Controllers\Products;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
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
}
