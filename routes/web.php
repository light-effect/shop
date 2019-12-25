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

Route::get('/', 'IndexController@index');
Route::get('/sign-up', 'IndexController@signUp');
Route::post('/sign-up', 'IndexController@postSignUp');

Route::get('/sign-in', 'IndexController@signIn');
Route::post('/sign-in', 'IndexController@postSignIn');

Route::get('/logout', 'IndexController@logout');

Route::get('/category/{id?}', 'IndexController@category');

Route::group(['prefix' => 'product'], function () {
    Route::get('create', 'ProductController@create');
    Route::post('create', 'ProductController@postCreate');

    Route::get('update/{id}', 'ProductController@update');
    Route::post('update', 'ProductController@postUpdate');
});
