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

Route::get('/','BankController@landing');

//BANK FORM ROUTING
Route::get('banks','BankController@index')->name('banks');
Route::post('addbank','BankController@store');
Route::post('editbank','BankController@update');
Route::post('deletebank','BankController@destroy');

//BANK BRANCH ROUTING
Route::get('bankBranch','BankbranchController@index')->name('bankBranch');
Route::post('addbankBranch','BankbranchController@store')->name('addbankBranch');
Route::get('branchedit','BankbranchController@edit')->name('branchedit');
Route::post('branchupdate','BankbranchController@update')->name('branchupdate');
Route::post('deletebankbranch','BankbranchController@destroy');
