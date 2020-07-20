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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'AccountController@index')->name('account.index');
Route::get('/create', 'AccountController@create')->name('account.create');
Route::post('/store', 'AccountController@store')->name('account.store');

Route::post('/delete/{account}', 'AccountController@destroy')->name('account.destroy');

Route::get('/add/{account}', 'AccountController@add')->name('account.add');

Route::post('/add/{account}', 'AccountController@add')->name('account.add');

Route::get('/change/{account}', 'AccountController@change')->name('account.change');
Route::post('/change/{account}', 'AccountController@change')->name('account.change');

Route::post('/upload/{account}', 'AccountController@upload')->name('account.upload');

Route::get('/subtract/{account}', 'AccountController@subtract')->name('account.subtract');

Route::post('/subtract/{account}', 'AccountController@subtract')->name('account.subtract');

Auth::routes();
