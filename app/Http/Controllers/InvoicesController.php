<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function index()
    {
      return 'all invoices';
    }

    public function create()
    {
        return view('invoice.new');
    }
}
