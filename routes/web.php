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

Route::resource('dashboard'	      	  , 'DashboardController');
Route::resource('roles'			  	  , 'RoleController');
Route::resource('users'			  	  , 'UserController');
Route::resource('expenses'			  , 'ExpenseController');
Route::resource('expense-categories'  , 'ExpenseCategoryController');

Route::get('roles/edit/{id}', 'RoleController@edit');
Route::get('roles/show/{id}', 'RoleController@show');

Route::get('expense-categories/edit/{id}', 'ExpenseCategoryController@edit');
Route::get('expense-categories/show/{id}', 'ExpenseCategoryController@show');

Route::get('expenses/edit/{id}', 'ExpenseController@edit');
Route::get('expenses/show/{id}', 'ExpenseController@show');

Route::get('users/edit/{id}', 'UserController@edit');
Route::get('users/show/{id}', 'UserController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
