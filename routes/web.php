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
Route::get('/', 'RespondenController@index')->name('welcome');
Route::post('store', 'RespondenController@store')->name('respond');
Route::get('input/{id}/review', 'InputController@index')->name('home');
Route::post('input', 'InputController@store')->name('input');

Route::prefix('admin')->group(function(){
    Route::get('index', 'DashboardController@index')->name('dashboard');

    Route::resource('berita', 'BeritaController');
    Route::resource('kuesioner', 'KuesionerController');
    Route::resource('bidang', 'BidangController');
    Route::resource('jenis_pelayanan', 'JenisPelayananController');
    Route::get('skala_likert', 'SkalaLikertController@index')->name('skala_likert.index');
    Route::get('hasil', 'HasilController@index')->name('hasil.index');
});