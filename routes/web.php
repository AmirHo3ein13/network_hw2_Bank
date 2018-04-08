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

//Auth::routes();

Route::post('/sign-in', 'UsersController@sign_in');
Route::post('/sign-out', 'UsersController@sign_out');
Route::post('/register', 'UsersController@register');

Route::post('/account/show_balance', 'AccountsController@show_balance')->middleware('login');
Route::post('/account/create_account', 'AccountsController@make')->middleware('login');

Route::post('/transaction/get_credit', 'TransactionsController@get_credit')->middleware('login');
Route::post('/transaction/send_credit', 'TransactionsController@send_credit')->middleware('login');
