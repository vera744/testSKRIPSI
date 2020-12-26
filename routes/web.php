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

Auth::routes();



// Route::get('/home', 'HomeController@index');


//CUSTOMER
Route::get('/gadai', 'GadaiController@index');

Route::get('/record', 'GadaiController@record');
Route::get('/gadai/add', 'GadaiController@add');
Route::get('/findProductName', 'GadaiController@findProductName');
Route::post('/gadai/create','GadaiController@create');
Route::post('/gadai/store','GadaiController@store');

Route::get('/ecom', 'EcomController@index');


//ADMIN
Route::get('/admin', 'AdminController@index');
Route::get('/manageGadai', 'manageGadaiController@index');
Route::get('/recordadmin','manageGadaiController@record');
Route::post('/acceptGadai', 'manageGadaiController@update');
Route::get('/manage/acc/{id}','manageGadaiController@acc');
Route::get('/manage/reject/{id}','manageGadaiController@reject');

Route::get('/manage/input_transaction/{id}','manageGadaiController@skejul');


Route::get('/profile', 'ProfileController@index');
Route::get('/profile/{id}', 'ProfileController@update');


Route::post('/changePassword/{id}','ProfileController@postChangePassword');