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

Route::get('/curl', 'IndexController@curl');

Route::get('/sign-up', 'IndexController@signUp');
Route::post('/sign-up', 'IndexController@postSignUp');

Route::get('/sign-in', 'IndexController@signIn')->name('sign');
Route::post('/sign-in', 'IndexController@postSignIn');

Route::get('/logout', 'IndexController@logout');

Route::get('/category/{id?}', 'IndexController@category');

Route::post('/search', 'ProductController@search');

Route::group(['prefix' => 'product'], function () {
    Route::get('{id}', 'ProductController@get')->where('id', '[0-9]+');

    Route::get('create', 'ProductController@create');
    Route::post('create', 'ProductController@postCreate');

    Route::get('update/{id}', 'ProductController@update');
    Route::post('update', 'ProductController@postUpdate');
});



Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'basket'], function () {
        Route::get('index', 'BasketController@index');

        Route::post('add', 'BasketController@add');
        Route::post('update', 'BasketController@update');
        Route::get('remove/{id}', 'BasketController@remove');

        Route::get('count', 'BasketController@count');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('create', 'OrderController@create');
        Route::post('create', 'OrderController@postCreate');

        Route::get('all', 'OrderController@all');
    });
});
