<?php

namespace App\Http\Controllers;

use App\UserTransactions;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
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
     * @param  \App\UserTransactions  $userTransactions
     * @return \Illuminate\Http\Response
     */
    public function show(UserTransactions $userTransactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTransactions  $userTransactions
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTransactions $userTransactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTransactions  $userTransactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTransactions $userTransactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTransactions  $userTransactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTransactions $userTransactions)
    {
        //
    }
}
