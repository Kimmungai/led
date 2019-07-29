<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Org;
use App\UserTransactions;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        return "all users";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orgs = Org::all();
        return view('user.create',compact('orgs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
      $validatedData = $request->except(['credit','paymentMethod']);
      if( !$request->password ){$validatedData['password']=env('DEFAULT_PASSWORD','ledamcha');}
      if( $validatedData['avatar'] == '' ){$validatedData['avatar'] = '/placeholders/avatar-male.png';}
      $validatedData['password'] = Hash::make($validatedData['password']);
      $user = User::create($validatedData);

      $userTrans = new UserTransactions;
      $userTrans->user_id = $user->id;
      $userTrans->credit = $request->credit;
      $userTrans->paymentMethod = $request->paymentMethod;
      $userTrans->save();

      Session::flash('message', env("SAVE_SUCCESS_MSG","User saved succesfully!"));

     if( $request->type == 3 ){
        return redirect(route('admin.index'));
      }elseif ( $request->type == 4 ) {
        return redirect(route('suppliers.index'));
      }elseif ( $user->type == 2 ) {
        return redirect(route('customers.index'));
      }
      return redirect(route('staff.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $orgs = Org::all();
        return view('user.edit',compact('user','orgs'));
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
    public function update(StoreUser $request, User $user)
    {
      $validatedData = $request->validated();
      if( $request->password ){
        $validatedData['password']=$request->password;
        $validatedData['password'] = Hash::make($validatedData['password']);
      }else{
        unset($validatedData['password']);
      }
      $user->update($validatedData);
      if( $request->credit > 0 ){
        $userTrans = new UserTransactions;
        $userTrans->user_id = $user->id;
        $userTrans->credit = $request->credit;
        $userTrans->paymentMethod = $request->paymentMethod;
        $userTrans->save();
      }

      Session::flash('message', env("SAVE_SUCCESS_MSG","User updated succesfully!"));
      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      if( $user->id == Auth::ID() ){
        Session::flash('error', env("SAVE_SUCCESS_MSG","You cannot delete yourself!"));
        return back();
      }
      UserTransactions::where('user_id',$user->id)->delete();
      $user->forceDelete();
      Session::flash('message', env("SAVE_SUCCESS_MSG","User deleted succesfully!"));

      if( $user->type == 3 ){
         return redirect(route('admin.index'));
       }elseif ( $user->type == 4 ) {
         return redirect(route('suppliers.index'));
       }elseif ( $user->type == 2 ) {
         return redirect(route('customers.index'));
       }

       return redirect(route('staff.index'));
    }
}
