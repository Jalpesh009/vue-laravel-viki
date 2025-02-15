<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => ['api']
], function ($router) {    
        Route::get('lists', 'AwesomeListController@index');
        Route::post('store', 'AwesomeListController@store');
        Route::get('edit/{id}', 'AwesomeListController@edit');
        Route::post('update/{id}', 'AwesomeListController@update');
        Route::delete('delete/{id}', 'AwesomeListController@destroy');
});
