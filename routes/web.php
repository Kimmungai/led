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
Route::get('trash-staff','StaffController@trashed_staff')->name('trash.staff');
Route::get('trash-staff-show/{id}','StaffController@trashed_staff_show')->name('trash.staff.show');
Route::post('staff-restore/{id}','StaffController@staff_restore')->name('staff.restore');
Route::delete('staff-remove/{id}','StaffController@staff_remove')->name('staff.remove');

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
Route::get('trash-empty','TrashController@empty')->name('trash.empty');

//org
Route::resource('org','OrgController');
Route::get('trash-org','OrgController@trashed_org')->name('trash.org');
Route::get('trash-org-show/{id}','OrgController@trashed_org_show')->name('trash.org.show');
Route::post('org-restore/{id}','OrgController@org_restore')->name('org.restore');
Route::delete('org-remove/{id}','OrgController@org_remove')->name('org.remove');

//image upload ajax
Route::post('img-tmp','Images\ImageAjaxController@img_tmp');
