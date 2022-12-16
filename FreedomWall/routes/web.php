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

// Route::get('/', function () {
//     // $wall = App\Wall::latest('updated_at')->get();

//     return view('welcome' , [
//         // 'wall' => $wall
//     ]);
// });
Route::get('/','WallController@index');

Route::get('/getComments','WallController@fetchcomment');
// Route::get('/getComment','WallController@getComment');
Route::post('/store', 'WallController@store');
Route::post('/delete', 'WallController@destroy');
Route::post('/update', 'WallController@update');
Route::get('/{comment}/edit', 'WallController@edit');

Route::get('/{comment}', 'WallController@show');


