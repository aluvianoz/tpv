<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/ajax', function () {
    return view('ajax.index');
});*/

Route::get('/ajax/search',[
  'uses'=>'ajaxController@index',
  'as'=>'ajax.index'
]);
Route::post('/ajax',[
  'uses'=>'ajaxController@searchProduct',
  'as'=>'ajax.searchProduct'
]);
