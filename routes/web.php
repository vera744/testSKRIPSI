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


//ADMIN
Route::get('/admin', 'AdminController@index');
Route::get('/manageGadai', 'manageGadaiController@index')->middleware('admin');
Route::get('/recordadmin','manageGadaiController@record')->middleware('admin');
Route::get('/tinjauanSelesai','manageGadaiController@done')->middleware('admin');
Route::post('/acceptGadai', 'manageGadaiController@update')->middleware('admin');
Route::get('/manage/acc/{id}','manageGadaiController@acc')->middleware('admin');
Route::get('/manage/reject/{id}','manageGadaiController@reject')->middleware('admin');

Route::get('/manage/input_transaction/{id}','manageGadaiController@skejul')->middleware('admin');;

Route::group(['middleware'=> 'auth'], function() {
    Route::get('changepassword', 'ProfileController@changepassword')->name('user.password.edit');
    Route::patch('changepassword', 'ProfileController@updatepassword')->name('user.password.update');
});

Route::get('/ecom', 'EcomController@index')->middleware('member');
Route::get('/ecom/detailproduct', 'EcomController@detail');

