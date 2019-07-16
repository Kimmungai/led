<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\User;
use App\UserTransactions;
use App\Org;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customers = User::where('type',env('CUSTOMER',2))->orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',4));
      return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orgs = Org::all();
        return view('customer.create',compact('orgs'));
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
      $user = User::find($id);
      $orgs = Org::all();
      return view('customer.edit',compact('user','orgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Display a listing of trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function trashed_customers()
     {
       $customers = User::where('type',env('CUSTOMER',2))->orderBy('created_at','DESC')->onlyTrashed()->paginate(env('ITEMS_PER_PAGE',4));
       return view('customer.trash.index',compact('customers'));
     }

     /**
      * Display the specified trashed resource.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function trashed_customer_show($id)
     {
         $user = User::where('id',$id)->onlyTrashed()->first();
         $orgs = Org::all();
         return view('customer.trash.edit',compact('user','orgs'));
     }

     /**
      * Restore the specified trashed resource.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function customer_restore($id)
     {
         $user = User::where('id',$id)->onlyTrashed()->first();
         $user->restore();
         UserTransactions::where('user_id',$user->id)->restore();
         Session::flash('message', env("SAVE_SUCCESS_MSG","Customer restored succesfully!"));
         return redirect(route('trash.customers',$id));
     }

     /**
      * Remove the specified trashed resource permanently.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function customer_remove($id)
     {return "nya";
         $user = User::where('id',$id)->onlyTrashed()->first();
         UserTransactions::where('user_id',$user->id)->forceDelete();
         $user->forceDelete();
         Session::flash('message', env("SAVE_SUCCESS_MSG","User permanently deleted succesfully!"));
         return redirect(route('trash.customers',$id));
     }
}
