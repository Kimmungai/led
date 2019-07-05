<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Invoices
Route::get('invoices','InvoicesController@index')->name('invoices.all');
Route::get('new-invoice','InvoicesController@create')->name('invoices.new');

//Reports
Route::resource('reports','ReportsController');
