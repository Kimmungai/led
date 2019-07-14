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
Route::get('invoices','InvoicesController@index')->name('invoices.index');
Route::get('invoices/create','InvoicesController@create')->name('invoices.create');

//Reports
Route::resource('reports','ReportsController');
Route::resource('quick-reports','QuickReportsController');
Route::resource('detailed-reports','DetailedReportsController');

//users
Route::resource('users','UsersController');

//customers
Route::resource('customers','CustomersController');

//suppliers
Route::resource('suppliers','SuppliersController');

//staff
Route::resource('staff','StaffController');

//admin
Route::resource('admin','AdminController');


//sales
Route::resource('sales','SalesController');

//purchases
Route::resource('purchases','PurchasesController');

//product
Route::resource('stock','ProductsController');

//payments
Route::resource('payments','PaymentsController');

//trash
Route::get('trash','TrashController@index')->name('trash.index');

//org
Route::resource('org','OrgController');

//image upload ajax
Route::post('img-tmp','Images\ImageAjaxController@img_tmp');
