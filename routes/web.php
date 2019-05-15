<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('basic', 'testController@basic');

Route::get('/home', 'HomeController@index')->name('home');
