<?php

namespace App\Http\Controllers\Products;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;

class ProductAjaxController extends Controller
{
    public function get_product(Request $request)
    {
      $request->validate(['id'=>'required|numeric']);
      $prodID = $request->id;
      $product = Product::find($prodID);
      return $product;
    }
}
