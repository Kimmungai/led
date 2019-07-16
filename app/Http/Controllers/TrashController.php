<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Expense;
use App\Inventory;
use App\Org;
use App\Product;
use App\Purchase;
use App\Report;
use App\Revenue;
use App\Sale;
use App\User;
use App\UserTransactions;
use App\Variation;

class TrashController extends Controller
{
    public function index()
    {
      $orgs = Org::onlyTrashed()->get();
      $staffs = User::where('type',env('STAFF',1))->onlyTrashed()->get();

      return view('trash.index',compact('orgs','staffs'));
    }

    public function empty()
    {
      //Expense::onlyTrashed()->forceDelete();
      //Inventory::onlyTrashed()->forceDelete();
      Org::onlyTrashed()->forceDelete();
      //Product::onlyTrashed()->forceDelete();
      //Purchase::onlyTrashed()->forceDelete();
      //Report::onlyTrashed()->forceDelete();
      //Revenue::onlyTrashed()->forceDelete();
      //Sale::onlyTrashed()->forceDelete();
      //UserTransactions::onlyTrashed()->forceDelete();
      //Variation::onlyTrashed()->forceDelete();
      User::onlyTrashed()->forceDelete();
      Session::flash('message', env("SAVE_SUCCESS_MSG","Trash emptied!"));
      return redirect(route('trash.index'));
    }
}
