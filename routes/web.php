<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'TransaksiController@index')->name('home');

Route::post('/donate/store/', 'TransaksiController@store')->name('transaksi');

Auth::routes();

Route::get('/home', 'TransaksiController@home')->name('admin.home');
Route::post('/accept/{id}/{status}', 'TransaksiController@accept')->name('admin.accept');