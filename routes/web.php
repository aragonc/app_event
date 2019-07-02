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

Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::get('/admin', 'DashboardController@index')->name('admin');
Route::resource('/admin/category', 'Admin\CategoryController');
Route::resource('/admin/event', 'Admin\EventController');
Route::resource('/admin/people', 'Admin\PeopleController');

Route::get('/event/{slug}', 'PageController@post')->name('event');