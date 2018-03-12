<?php

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/my_gigs', 'GigController@index')->name('my_gigs');
    Route::group(['prefix' => 'gigs'], function () {
        Route::get('create', 'GigController@create')->name('gigs.create');
        Route::post('store', 'GigController@store')->name('gigs.store');
        Route::get('details/{slug}', 'GigController@show')->name('gigs.show');
    });
});


// admin login
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.post');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AdminLoginController@logout']);
});

// admin functions
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'Admin\AdminController@index');
});
