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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/transactions', 'TransactionController@index')->name('index');
Route::get('/transactions/add-transaction', 'TransactionController@create')->name('create');
Route::post('/transactions', 'TransactionController@store')->name('store');
Route::get('/transations/{transaction}', 'TransactionController@show')->name('show');
Route::get('/transactions/{transaction}/edit-transaction', 'TransactionController@edit')->name('edit');
Route::patch('/transactions/{transaction}', 'TransactionController@update')->name('update');
Route::delete('/transactions/{transaction}', 'TransactionController@destroy')->name('destroy');
Route::get('/home', 'HomeController@index')->name('home');
