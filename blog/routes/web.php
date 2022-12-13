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
    return view('welcome', [
    ]);
});


// Route::get('/myFirstLaravel', function () {
//     return view('myFirstLaravel',[
//         // 'name' => request('name')
//     ]);
// });

Route::get('/about', function () {
    
    return view('about', [
        
    ]);
});
Route::get('/skills', function () {
    return view('skills', [
        'expertise' =>App\expertise::latest('updated_at')->get()
    ]);
});


Route::post('/skills', 'ExpertiseController@store');
Route::get('/skills/create', 'ExpertiseController@create');
Route::get('/skills/{expertise}', 'ExpertiseController@show');
Route::get('/skills/{expertise}/edit', 'ExpertiseController@edit');
Route::put('/skills/{expertise}', 'ExpertiseController@update');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
