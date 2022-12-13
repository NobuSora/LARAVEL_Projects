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

Route::get('/', function () {
    $wall = App\Wall::latest('updated_at')->get();

    return view('welcome' , [
        'wall' => $wall
    ]);
});

Route::post('/store', 'WallController@store');
Route::get('/{comment}/edit', 'WallController@edit');
Route::delete('/{comment}/delete', 'WallController@destroy');
Route::get('/{comment}', 'WallController@show');
Route::put('/{comment}', 'WallController@update');
