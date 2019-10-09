<?php

use Illuminate\Http\Request;

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

//Route Feature
Route::get('/feature/list/{slug}','Admin\FeatureController@list')->name('list');
Route::delete('/feature/{slug}','Admin\FeatureController@destroy')->name('delete');
Route::post('/feature','Admin\FeatureController@store')->name('store');
Route::post('/feature/{slug}','Admin\FeatureController@update')->name('update');