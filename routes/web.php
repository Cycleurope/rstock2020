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

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/anomalies', 'ProductController@anomalies')->name('products.anomalies');


Route::get('/users/create/{role}', 'UserController@createWithRole')->name('users.create.role');

Route::get('/users/sales', 'UserController@sales')->name('users.sales');
Route::get('/users/sales/create', 'UserController@createSales')->name('users.sales.create');
Route::get('/users/sales/{id}/edit', 'UserController@editSales')->name('users.sales.edit');

Route::get('/users/admins', 'UserController@admins')->name('users.admins');
Route::get('/users/admins/create', 'UserController@createAdmin')->name('users.admins.create');

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
Route::get('/stats/logins/most-active', 'UserLoginController@mostActiveUsers')->name('stats.logins.most-active');