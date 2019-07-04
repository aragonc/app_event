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
