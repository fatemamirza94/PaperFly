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

//DIVISION ROUTING
Route::get('division','DivisionController@index')->name('division');
Route::post('addDivision','DivisionController@store');
Route::post('editDivision','DivisionController@update');
Route::post('deleteDivision','DivisionController@destroy');

//DISTRICT ROUTING
Route::get('district','DistrictController@index')->name('district');
Route::post('addDistrict','DistrictController@store')->name('addDistrict');
Route::get('districtedit','DistrictController@edit')->name('districtedit');
Route::post('editDistrict','DistrictController@update')->name('editDistrict');
Route::post('deleteDistrict','DistrictController@destroy');

//THANA ROUTING
Route::get('thana','ThanaController@index')->name('thana');
Route::post('addThana','ThanaController@store')->name('addThana');
Route::get('thanaedit','ThanaController@edit')->name('thanaedit');
Route::post('editThana','ThanaController@update')->name('editThana');
Route::post('deleteThana','ThanaController@destroy');
