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
Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware('guest')->name('home');

Route::get('/search', 'AppController@search')->name('search');
Route::get('/export-dealers', 'AppController@exportDealers')->name('export.dealers');
Route::get('/export-stock', 'AppController@exportProducts')->name('export.stock');

Route::get('/dashboard', 'AppController@dashboard')->name('dashboard');
Route::get('/profile', 'AppController@profile')->name('profile');

Route::get('/change-password', 'ChangePasswordController@index')->name('password.index');
Route::post('/change-password', 'ChangePasswordController@store')->name('password.store');
Route::get('/reset-password', 'ChangePasswordController@reset')->name('password.reset');
Route::get('/send-new-password', 'ChangePasswordController@send')->name('password.send');

Route::get('/import-passwords', 'ChangePasswordController@importForm')->name('passwords.import.form');
Route::post('/import-passwords/process', 'ChangePasswordController@import')->name('passwords.import');

Route::post('/reset-password', 'ChangePasswordController@sendNewEmail')->name('password.send.new');


Route::get('/users/admins', 'UserController@admins')->name('users.admins');
Route::get('/users/monitors', 'UserController@monitors')->name('users.monitors');
Route::get('/users/guests', 'UserController@guests')->name('users.guests');
Route::get('/users/dealers', 'UserController@dealers')->name('users.dealers');

Route::get('/products', 'ProductController@index')->name('products.index');


Route::get('/users/create/{role}', 'UserController@createWithRole')->name('users.create.role');

Route::get('/users/outdated', 'UserController@outdatedAssortments')->name('users.outdated');
Route::get('/users/last-logins', 'UserController@lastLogins')->name('users.logins.last');
Route::resource('/users', 'UserController');
Route::post('/users/activate/{id}', 'UserController@activate')->name('users.activate');
Route::post('/users/desactivate/{id}', 'UserController@desactivate')->name('users.desactivate');

Route::resource('/banners', 'BannerController');

Route::get('/labels/import', 'LabelController@importForm')->name('labels.import.form');
Route::resource('/labels', 'LabelController');
Route::post('/labels/import', 'LabelController@import')->name('labels.import');

Route::get('/stats/logins', 'UserLoginController@index')->name('stats.logins.index');