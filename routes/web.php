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
    return view('welcome');
});

Auth::routes();

//Admin
Route::get('/admin', 'DashboardController@index')->name('admin');
Route::resource('/admin/category', 'Admin\CategoryController');
Route::resource('/admin/event', 'Admin\EventController');
Route::resource('/admin/people', 'Admin\PeopleController');
Route::resource('/admin/user', 'Admin\UserController');

Route::get('/event/{slug}', 'PageController@post')->name('event');
Route::get('/admin/setting', 'SettingController@index')->name('setting');
Route::get('/admin/setting/edit/{id}', 'SettingController@edit')->name('setting.edit');
Route::put('/admin/setting/update/{id}', 'SettingController@update')->name('setting.update');
Route::get('/export/excel', 'ExcelController@exportPeoples')->name('excel');

//Route Feature
/*Route::get('admin/feature/list/{slug}','Admin\FeatureController@list')->name('list');
Route::delete('admin/feature/{slug}','Admin\FeatureController@destroy')->name('delete');
Route::post('admin/feature','Admin\FeatureController@store')->name('store');
Route::post('admin/feature/{slug}','Admin\FeatureController@update')->name('update');*/

Route::get('/admin/feature/{feature_id?}', 'Admin\FeatureController@show');
//create New Product
Route::post('/admin/feature/store', 'Admin\FeatureController@store')->name('feature.store');
// update Existing Product
Route::put('/admin/feature/{id}', 'Admin\FeatureController@update')->name('feature.update');
// delete product
Route::delete('/admin/feature/{id}', 'Admin\FeatureController@destroy');