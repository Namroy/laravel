<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Auth::routes();
Route::auth();

Route::resource('perfil','PerfilController');



Route::get('producto','ProductoController@index');
Route::post('producto/store','ProductoController@store');
Route::get('producto/show','ProductoController@show');
Route::post('producto/update','ProductoController@update');
Route::post('producto/delete','ProductoController@delete');



Route::get('home','HomeController@index');
Route::get('/','HomeController@index');
Route::post('/add','HomeController@add');
Route::get('/view','HomeController@view');
Route::post('/update','HomeController@update');
Route::post('/delete','HomeController@delete');

