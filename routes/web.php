<?php

Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@search')->name('search');
Auth::routes();

Route::get('/users/{name}', 'ProfileController@user_profile')->name('profile');


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/my_gigs', 'GigController@index')->name('my_gigs');
    Route::group(['prefix' => 'gigs'], function () {
        Route::get('create', 'GigController@create')->name('gigs.create');
        Route::post('store', 'GigController@store')->name('gigs.store');
        Route::get('details/{slug}', 'GigController@show')->name('gigs.show');
    });

    Route::get('read-all-notifications', 'NotificationController@readall')->name('read.all');

    Route::get('my-buyer', 'BuyerSellerController@my_buyer')->name('my-buyer');

    Route::post('create-order', 'PurchaseController@store')->name('create.order');
    Route::get('notification-items/{notification}', 'NotificationController@show')->name('notification.show');

    Route::get('/users/{username}/requests', 'BuyerRequestController@index')->name('users.requests');
    Route::get('/users/{username}/create-request', 'BuyerRequestController@create')->name('create.request');
    Route::post('/users/{username}/store-request', 'BuyerRequestController@store')->name('store.request');
});


// admin login
Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.post');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

// admin functions
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'Admin\AdminController@index');
    Route::resource('/categories', 'Admin\CategoryController', [
        'as' => 'admin'
    ]);

    Route::resource('/sliders', 'Admin\SliderController', [
        'as' => 'admin'
    ]);
});
