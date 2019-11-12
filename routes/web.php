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

Route::get('/','HomeController@getHome');

/*Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return view('logout');
});*/



Route::get('/home', 'HomeController@getHome')->name('home');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/auth',function(){
        return view('auth.login');
    });

    Route::get('/catalog','CatalogController@getIndex');

    Route::get('/catalog/show/{id}','CatalogController@getShow');
    Route::put('/catalog/create','CatalogController@postCreate');
    Route::get('/catalog/create','CatalogController@getCreate');
    
    Route::put('/catalog/edit/{id}','CatalogController@putEdit');
    Route::get('/catalog/edit/{id}','CatalogController@getEdit');
    
   
});

