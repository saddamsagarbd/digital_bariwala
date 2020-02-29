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

Route::get('/','home\homeController@index');
Route::post('/login-check','home\homeController@loginCheck');
Route::get('/dashboard','DashboardController@index');
Route::get('/session','DashboardController@session');
Route::get('/user','DashboardController@userlist');
Route::post('/create-user','DashboardController@create')->name('create-user');
Route::get('/getuserbyid/{id}/edit','DashboardController@getuserbyid')->name('getuserbyid');
Route::get('/logout','home\homeController@logout');
Route::get('/apartment-details','apartment\ApartmentController@index');
