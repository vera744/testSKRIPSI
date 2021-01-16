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

use App\Http\Controllers\GadaiController;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Auth::routes();

//CUSTOMER
Route::get('/gadai', 'GadaiController@index')->middleware('member');
Route::get('/record', 'GadaiController@record')->middleware('member');
Route::get('/gadai/add', 'GadaiController@add')->middleware('member');
Route::get('/findProductName', 'GadaiController@findProductName')->middleware('member');
Route::post('/gadai/create','GadaiController@create')->middleware('member');
Route::post('/gadai/store','GadaiController@store')->middleware('member');
Route::get('/cart','CartController@index');
Route::get('/gadai/payment/{id}', 'GadaiController@indexPayment');
Route::get('/gadai/append/{id}', 'GadaiController@indexAppend');

//ADMIN
Route::get('/admin', 'AdminController@index');
Route::get('/manageGadai', 'manageGadaiController@index')->middleware('admin');
Route::get('/recordadmin','manageGadaiController@record')->middleware('admin');
Route::get('/tinjauanSelesai','manageGadaiController@done')->middleware('admin');
Route::post('/acceptGadai', 'manageGadaiController@update')->middleware('admin');
Route::get('/manage/acc/{id}','manageGadaiController@acc')->middleware('admin');
Route::get('/manage/reject/{id}','manageGadaiController@reject')->middleware('admin');

Route::get('/manage/input_transaction/{id}','manageGadaiController@skejul')->middleware('admin');

Route::get('/manage/append/{id}','manageGadaiController@append');
Route::get('/manage/complete/{id}','manageGadaiController@compelete');


Route::get('/profile', 'ProfileController@index');
Route::get('/profile/{id}', 'ProfileController@update');


Route::group(['middleware'=> 'auth'], function() {
Route::get('changepassword', 'ProfileController@changepassword')->name('user.password.edit');
    Route::patch('changepassword', 'ProfileController@updatepassword')->name('user.password.update');
});


//ECOM
Route::get('/ecom', 'EcomController@index')->middleware('member');
Route::get('/ecom/detailproduct/{productID}', 'EcomController@productdetail')->middleware('member');
Route::get('/search', 'EcomController@search')->name('search');
Route::get('/produkkategoriHP', 'EcomController@handphone');
Route::get('/produkkategoriLaptop', 'EcomController@laptop');
Route::get('/produkkategoriElektronik', 'EcomController@elektronik');

Route::post('/ecom/add-to-cart/{productID}','CartController@add')->middleware('member');

Route::get('/ecom/cart','CartController@index')->middleware('member');
Route::post('/destroy', 'CartController@destroy')->name('cart.destroy');
Route::post('/checkout', 'CartController@checkout')->name('ecom.checkout')->middleware('member');
Route::get('/editalamat', 'CartController@editalamat')->name('editalamat')->middleware('member');
Route::get('/tambahalamatt', 'CartController@tambahalamat')->middleware('member');
Route::get('/backcheckout', 'CartController@backcheckout')->middleware('member');

// Route::post('/editalamat{userID}', 'CartController@editalamatID')->middleware('member');
Route::post('/alamat/tambahbaru', 'CartController@tambahalamatbaru')->middleware('member');
Route::post('/destroyalamat', 'CartController@destroyalamat')->name('alamat.destroy');

// Route::get('/checkout', 'CartController@checkoutpage')->middleware('member');

Route::get('/ecom/detailback/{productID}', 'EcomController@back')->middleware('member');

//EMAIL
Route::get('/kirimemail','EmailController@index');


//TEST
Route::get('province','CartController@get_province')->name('province');
Route::get('/kota/{id}','CartController@get_city');
Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}','CartController@get_ongkir');

//TEST API
Route::get('/api','getApi@index');
