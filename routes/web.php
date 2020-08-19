<?php

use Illuminate\Support\Facades\Route;

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

/* Error handler on incorrect route */
//Route::fallback(function(){
//   abort(404);
//});

/* Guest Routes */


Route::get('/', 'Controller@index')->name('index');
Route::post('/', 'Controller@getproductindex')->name('getproductindex');

Route::get('/product', 'Products@getproduct')->name('product');
Route::post('/product', 'Products@filterlist')->name('filterlist');

Route::get('/contact', function () {
  return view('contact');
})->name('contact');
/* Registration Routes */
Auth::routes(['verify' => true]);
Route::get('/login', function () {
  return view('login');
})->name('login');
Route::get('/register', function () {
  return view('register');
})->name('register');
Auth::routes();
/*Cart Routes*/
Route::get('/cart', 'CartController@view')->name('cart');
Route::post('/cart', 'CartController@store')->name('store');
Route::delete('/cart/{id}', 'CartController@delete')->name('delete');
Route::post('/cart/{id}', 'CartController@update')->name('update');
Route::get('/cart/empty', 'CartController@empty')->name('empty');

Route::get('/checkout', 'Orders@checkoutpage')->name('checkout');
Route::post('/checkout', 'Orders@store');

/* Admin Routes */
Route::get('/admin', 'HomeController@index')->name('adminhome')->middleware('isadmin');
Route::get('/admin/orders', 'HomeController@orders')->name('vieworder')->middleware('isadmin');
Route::post('/admin/orders/{id}', 'HomeController@orderdetails')->name('orderdetails')->middleware('isadmin');
Route::post('/admin/orders', 'HomeController@updatestatus')->name('updatestatus')->middleware('isadmin');
Route::post('/admin/orderfilter', 'HomeController@orderfilter')->name('orderfilter')->middleware('isadmin');
Route::get('/admin/viewcategory', 'HomeController@viewcategory')->name('viewcategory')->middleware('isadmin');
Route::post('/admin/viewcategory', 'HomeController@addcategory')->name('addcategory')->middleware('isadmin');
Route::post('admin/viewcategory/{id}', 'HomeController@updatecategory')->name('updatecategory')->middleware('isadmin');
Route::get('/admin/viewarea', 'HomeController@viewarea')->name('viewarea')->middleware('isadmin');
Route::post('/admin/viewarea', 'HomeController@addarea')->name('addarea')->middleware('isadmin');
Route::post('/admin/viewarea/{id}', 'HomeController@updatearea')->name('updatearea')->middleware('isadmin');
Route::get('/admin/viewcustomers', 'HomeController@viewcustomers')->name('viewcustomers')->middleware('isadmin');
Route::get('/admin/viewproducts', 'HomeController@viewproducts')->name('viewproducts')->middleware('isadmin');
Route::get('/admin/addproduct', 'HomeController@addproduct')->name('addproduct')->middleware('isadmin');
Route::post('/admin/addproduct', 'HomeController@addproductsubmit')->name('addproductsubmit')->middleware('isadmin');
Route::get('/admin/editproduct/{id}', 'HomeController@editproduct')->name('editproduct')->middleware('isadmin');
Route::post('/admin/editproduct/{id}', 'HomeController@editproductsubmit')->name('editproductsubmit')->middleware('isadmin');
Route::delete('/admin/viewproducts', 'HomeController@deleteproduct')->name('deleteproduct')->middleware('isadmin');
Route::post('/admin/itemrequire', 'HomeController@itemrequire')->name('itemrequire')->middleware('isadmin');
Route::get('/admin/settings', 'HomeController@viewsettings')->name('viewsettings')->middleware('isadmin');
Route::post('/admin/setting/{id}', 'HomeController@updatesetting')->name('updatesetting')->middleware('isadmin');
/*Customer Routes */
Route::get('/customer', 'CustomerController@index')->name('customerhome')->middleware('iscustomer');
Route::get('/customer/orders', 'CustomerController@orders')->name('customervieworder')->middleware('iscustomer');
Route::post('/customer/orders/{id}', 'CustomerController@orderdetails')->name('customerorderdetails')->middleware('iscustomer');
Route::get('/customer/loyaltypoints', 'CustomerController@loyaltypoints')->name('loyaltypoints')->middleware('iscustomer');
Route::post('/customer/orderfilter', 'CustomerController@orderfilter')->name('orderfiltercustomer')->middleware('iscustomer');
