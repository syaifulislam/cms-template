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
    return redirect('login');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@authenticate');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware'=>'SentinelAuth'], function () {
    Route::get('/index', function () {
        return view('homepage/index');
    });
    // stock
    Route::get('category', 'CategoryController@index');
    Route::get('category/{id}', 'CategoryController@show');
    Route::post('category', 'CategoryController@store');
    Route::post('category/{id}', 'CategoryController@update');
    Route::get('sub-category', 'SubCategoryController@index');

    // user
    Route::get('user', 'UserController@index');
    Route::post('user', 'UserController@store');
    Route::get('user/{id}', 'UserController@show');
});
