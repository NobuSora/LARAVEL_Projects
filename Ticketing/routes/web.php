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
use App\Data;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

////Admin Routes
//Update
Route::post ( '/admin/editItem', 'AdminController@edit');
//Delete 
Route::post ( '/admin/deleteItem', 'AdminController@delete');
