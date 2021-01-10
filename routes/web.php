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

Route::get('/ecom/add-to-cart/{productID}','CartController@add')->middleware('member');

Route::get('/ecom/cart','CartController@index')->middleware('auth');

Route::get('/gadai/payment/{id}', 'GadaiController@indexPayment');