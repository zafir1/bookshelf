<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('book','BookController')->middleware('auth');


Route::get('booksearch'.'HomeController@index');
Route::post('booksearch', 'BookController@Search');
Route::get('book_details/{id}/add', 'BookDetailController@getAdd');
Route::post('book_details/{id}/add', 'BookDetailController@postAdd');

Route::get('basic', 'testController@getBasicForm');
Route::post('basic', 'testController@postBasicForm');
Route::get('interest', 'UserInterestController@index');

Route::post('add_new_interest', 'UserInterestController@store');
Route::post('submit_user_interest', 'UserInterestController@submitInterest');
Route::get('editor',function(){
	return view('forms.editor');
});
Route::get('/home', 'BookController@index')->name('home');

