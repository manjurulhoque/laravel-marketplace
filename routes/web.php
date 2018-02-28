<?php

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('gigs', 'GigController', ['except' => ['index', 'store']]);
Route::get('/my_gigs', 'GigController@index')->name('my_gigs');
Route::post('gigs/store', 'GigController@store')->name('gigs.store');
