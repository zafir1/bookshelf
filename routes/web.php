<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('book','BookController')->middleware('auth');
Route::get('basic', 'testController@getBasicForm');
Route::post('basic', 'testController@postBasicForm');
Route::get('interest', 'UserInterestController@index');
Route::post('add_new_interest', 'UserInterestController@store');
Route::post('submit_user_interest', 'UserInterestController@submitInterest');

Route::get('editor',function(){
	return view('forms.editor');
});

Route::get('/home', 'HomeController@index')->name('home');
