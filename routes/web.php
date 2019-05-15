<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('basic', function() {
    return view('user.basics');
});

Route::get('/home', 'HomeController@index')->name('home');
