<?php

/** -------------------- Splash Routes -------------------- **/
Route::get('/', 'SplashController@index')->name('index');
Route::get('/welcome', 'SplashController@welcome')->name('welcome');
Route::get('/ladder', 'SplashController@ladder')->name('ladder');
Route::get('/entries', 'SplashController@entries')->name('entries');
Route::get('/rules', 'SplashController@rules')->name('rules');

Route::get('/gallery', 'SplashController@gallery')->name('gallery');
Route::get('/contact', 'SplashController@contact')->name('contact');

Route::post('/contact', 'SplashController@email')->middleware('recaptcha');


/** -------------------- Authentication Routes -------------------- **/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


/** -------------------- Registration Routes -------------------- **/
if (! App::environment('staging')) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
}

/** -------------------- Password Reset Routes -------------------- **/
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


/** -------------------- Dashboard Routes -------------------- */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


/** -------------------- Flight Routes -------------------- */
Route::get('/flights/create', 'FlightsController@create')->name('flights.create');
Route::post('/flights', 'FlightsController@store')->name('flights.store');
Route::get('/flights/{flight}', 'FlightsController@show')->name('flights.show');


/** -------------------- Claims Routes -------------------- */
Route::get('/claims/create', 'ClaimsController@create')->name('claims.create');
Route::post('/claims', 'ClaimsController@store')->name('claims.store');


/** -------------------- Manage Routes -------------------- **/
Route::prefix('manage')->namespace('Admin')->middleware('auth')->middleware('admin')->group(function () {
    Route::get('/', 'ManageController@index')->name('admin.index');
    Route::post('/flights/update/{id}', 'FlightsController@update')->name('flights.update');
	Route::resource('claims', 'ClaimsController', ['only' => ['edit', 'update']]);
	Route::resource('flights', 'FlightsController', ['only' => ['edit']]);
});