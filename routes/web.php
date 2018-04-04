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

Use \Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/show_balance', 'AccountsController@show_balance')->name('show_balance');
Route::get('/get_balance', 'AccountsController@get_balance')->name('get_balance');
Route::get('/create_account', 'AccountsController@make')->name('create_account');

Route::get('/make_account', 'AccountsController@make');
Route::get('/info_to_create_account', 'AccountsController@info_to_create_account');

Route::post('/transaction/get_credit', 'TransactionsController@get_credit')->name('get_credit');
Route::get('/transaction/get_info', 'TransactionsController@get_info_get_credit')->name('get_info');
Route::get('/transaction/origin_destination_number', 'TransactionsController@origin_destination_number')->name('get_numbers');
Route::post('/transaction/check_transaction', 'TransactionsController@check_transaction')->name('check_transaction');
Route::post('/transaction/send_credit', 'TransactionsController@send_credit')->name('send_credit');
