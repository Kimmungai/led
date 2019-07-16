<?php

namespace App\Http\Controllers;

use App\User;
use App\Org;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $admins = User::where('type',env('ADMIN',3))->orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',4));
      return view('user.admin',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create admin";
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
    public function show(User $user)
    {
        //
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
     public function trashed_admin()
     {
       $admins = User::where('type',env('ADMIN',3))->orderBy('created_at','DESC')->onlyTrashed()->paginate(env('ITEMS_PER_PAGE',4));
       return view('user.trash.admin',compact('admins'));
     }

     /**
      * Display the specified trashed resource.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function trashed_admin_show($id)
     {
         $user = User::where('id',$id)->onlyTrashed()->first();
         $orgs = Org::all();
         return view('user.trash.edit',compact('user','orgs'));
     }

     /**
      * Restore the specified trashed resource.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function staff_restore($id)
     {
         $user = User::where('id',$id)->onlyTrashed()->first();
         $user->restore();
         Session::flash('message', env("SAVE_SUCCESS_MSG","User restored succesfully!"));
         return redirect(route('trash.staff',$id));
     }

     /**
      * Remove the specified trashed resource permanently.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function staff_remove($id)
     {
         $user = User::where('id',$id)->onlyTrashed()->first();
         $user->forceDelete();
         Session::flash('message', env("SAVE_SUCCESS_MSG","User permanently deleted succesfully!"));
         return redirect(route('trash.staff',$id));
     }
}
