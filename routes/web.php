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
Route::group(['prefix' => '/'],function(){
    Route::get('','NotepadController@index')->name('notepad.index');
    Route::get('/create','NotepadController@create')->name('notepad.create');
    Route::post('/create','NotepadController@store');

    Route::get('/update{id}','NotepadController@edit')->name('notepad.update');
    Route::post('/update{id}','NotepadController@update');

    Route::get('/delete{id}','NotepadController@delete')->name('notepad.delete');
    Route::get('view{id}','NotepadController@getTransactionDetail')->name('ajax.admin.transaction.detail');
});

Route::group(['prefix' => '/'],function(){
    Route::get('/createCategory','CategoryController@create')->name('category.create');
    Route::post('/createCategory','CategoryController@store');
});
