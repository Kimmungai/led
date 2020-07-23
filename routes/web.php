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

/*Route::get('nyau',function(){
  $doc = App\Quote::first();
  return view('pdf.quote',compact('doc'));
});*/
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::redirect('/home','/');
//Invoices
Route::get('invoices','InvoicesController@index')->name('invoices.index');
Route::get('invoices/create/','InvoicesController@create')->name('invoices.create');
Route::get('invoices-show/{id}','InvoicesController@show')->name('invoices.show');
Route::post('update-invoice','InvoicesController@update_invoice');
Route::post('invoices/delete','InvoicesController@destroy_invoice')->name('invoices.destroy');
Route::get('download-invoice/{id}', 'ShareController@download_invoice')->name('invoice.download');
Route::put('edit-invoice','InvoicesController@edit_invoice');

//Reports
Route::resource('quotation','QuotationsController');
Route::resource('report','IreportsController');
Route::post('update-ireport','IreportsController@update_ireport');
Route::get('download-quote/{id}', 'ShareController@download_quote')->name('quote.download');
Route::get('download-ireport/{id}', 'ShareController@download_ireport')->name('ireport.download');

//users
Route::resource('users','UsersController');

//customers
Route::resource('customers','CustomersController');
Route::get('trash-customers','CustomersController@trashed_customers')->name('trash.customers');
Route::get('trash-customer-show/{id}','CustomersController@trashed_customer_show')->name('trash.customer.show');
Route::post('customer-restore/{id}','CustomersController@customer_restore')->name('customer.restore');
Route::delete('customer-remove/{id}','CustomersController@customer_remove')->name('customer.remove');


//suppliers
Route::resource('suppliers','SuppliersController');
Route::get('trash-suppliers','SuppliersController@trashed_suppliers')->name('trash.suppliers');
Route::get('trash-supplier-show/{id}','SuppliersController@trashed_supplier_show')->name('trash.supplier.show');
Route::post('supplier-restore/{id}','SuppliersController@supplier_restore')->name('supplier.restore');
Route::delete('supplier-remove/{id}','SuppliersController@supplier_remove')->name('supplier.remove');

//staff
Route::resource('staff','StaffController');
Route::get('trash-staff','StaffController@trashed_staff')->name('trash.staff');
Route::get('trash-staff-show/{id}','StaffController@trashed_staff_show')->name('trash.staff.show');
Route::post('staff-restore/{id}','StaffController@staff_restore')->name('staff.restore');
Route::delete('staff-remove/{id}','StaffController@staff_remove')->name('staff.remove');

//admin
Route::resource('admin','AdminController');
Route::get('trash-admin','AdminController@trashed_admin')->name('trash.admin');
Route::get('trash-admin-show/{id}','AdminController@trashed_admin_show')->name('trash.admin.show');


//sales
Route::resource('sales','SalesController');
Route::post('save-cart-list','SalesController@save_cart_list')->name('save.cart.list');
Route::get('sale-stock-type/{type}','Products\ProductAjaxController@get_sale_product_type')->name('sales.stock.type');

//purchases
Route::resource('purchases','PurchasesController');
Route::post('save-purchase-list','PurchasesController@save_purchase_list')->name('save.purchase.list');

//product
Route::post('get-product','Products\ProductAjaxController@get_product')->name('product.get');
Route::get('stock-type/{type}','Products\ProductAjaxController@get_product_type')->name('stock.type');
Route::post('search-products','Products\ProductAjaxController@search_products');
Route::resource('stock','ProductsController');
Route::post('update-product','Products\ProductAjaxController@update_product');

//payments
Route::resource('payments','PaymentsController');
Route::get('trash-empty','TrashController@empty')->name('trash.empty');

//trash
Route::get('trash','TrashController@index')->name('trash.index');

//org
Route::resource('org','OrgController');
Route::get('trash-org','OrgController@trashed_org')->name('trash.org');
Route::get('trash-org-show/{id}','OrgController@trashed_org_show')->name('trash.org.show');
Route::post('org-restore/{id}','OrgController@org_restore')->name('org.restore');
Route::delete('org-remove/{id}','OrgController@org_remove')->name('org.remove');

//image upload ajax
Route::post('img-tmp','Images\ImageAjaxController@img_tmp');

//Extras
Route::post('save-list','HomeController@save_list')->name('save.list');
Route::post('share-doc','ShareController@share_doc');

//Business cards
Route::resource('business-card','BusinessCardsController');
Route::get('download-card/{user}', 'BusinessCardsController@download_card')->name('card.download');

//Blog
Route::resource('post','PostsCotroller');

//Agents
Route::resource('agent','AgentController');

//Clients
Route::resource('client','ClientController');

//Settings
Route::get('settings/page','SettingsPageController@index')->name('settings.page');
Route::get('settings/costs','SettingsCostsController@index')->name('settings.costs');
Route::put('settings/costs/{id?}','SettingsCostsController@update')->name('settings.costs');
