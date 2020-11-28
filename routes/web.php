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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');

Route::get('/gadai', 'GadaiController@index');

Route::get('/record', 'GadaiController@record');
Route::get('/gadai/add', 'GadaiController@add');
Route::post('/gadai/create','GadaiController@create');
Route::post('/gadai/store','GadaiController@store');



Route::get('/ecom', 'EcomController@index');

