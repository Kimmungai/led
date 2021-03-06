<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrg;
use Illuminate\Support\Facades\Session;
use Auth;
Use Image;
use App\Org;


class OrgController extends Controller
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
        $orgs = Org::orderBy('created_at','DESC')->paginate(env('ITEMS_PER_PAGE',4));
        return view('org.index',compact('orgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('org.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrg  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrg $request)
    {
        $org = Org::create($request->validated());
        Session::flash('message', env("SAVE_SUCCESS_MSG","Organisation saved succesfully!"));
        return redirect(route('org.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function show(Org $org)
    {
        return view('org.edit',compact('org'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function edit(Org $org)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrg  $request
     * @param  \App\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrg $request, Org $org)
    {
      $org->update($request->validated());
      Session::flash('message', env("SAVE_SUCCESS_MSG","Organisation updated succesfully!"));
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function destroy(Org $org)
    {
        if($org->delete()){

          Session::flash('message', env("SAVE_SUCCESS_MSG","Organisation deleted succesfully!"));

        }else{

          Session::flash('error', env("SAVE_SUCCESS_MSG","An error occured! Please contact admin."));
          return back();

        }
        return redirect(route('org.index'));
    }

    /**
     * Display a listing of trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function trashed_org()
     {
       $orgs = Org::orderBy('created_at','DESC')->onlyTrashed()->paginate(env('ITEMS_PER_PAGE',4));
       return view('org.trash.index',compact('orgs'));
     }

     /**
      * Display the specified trashed resource.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function trashed_org_show($id)
     {
         $org = Org::where('id',$id)->onlyTrashed()->first();
         return view('org.trash.edit',compact('org'));
     }

     /**
      * Restore the specified trashed resource.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function org_restore($id)
     {
         $org = Org::where('id',$id)->onlyTrashed()->first();
         $org->restore();
         Session::flash('message', env("SAVE_SUCCESS_MSG","Organisation restored succesfully!"));
         return redirect(route('trash.org',$id));
     }

     /**
      * Remove the specified trashed resource permanently.
      *
      * @param  $id
      * @return \Illuminate\Http\Response
      */
     public function org_remove($id)
     {
         $org = Org::where('id',$id)->onlyTrashed()->first();
         $org->forceDelete();
         Session::flash('message', env("SAVE_SUCCESS_MSG","Organisation permanently deleted succesfully!"));
         return redirect(route('trash.org',$id));
     }

}
