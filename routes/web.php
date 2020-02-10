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

Route::get('/dashboard', 'AppController@dashboard')->name('dashboard');
Route::get('/profile', 'AppController@profile')->name('profile');
Route::get('/change-password', 'ChangePasswordController@index')->name('password.index');
Route::post('/change-password', 'ChangePasswordController@store')->name('password.store');
Route::get('/reset-password', 'ChangePasswordController@reset')->name('password.reset');
Route::get('/send-new-password', 'ChangePasswordController@send')->name('password.send');
Route::post('/reset-password', 'ChangePasswordController@sendNewEmail')->name('password.send.new');


Route::get('/users/admins', 'UserController@admins')->name('users.admins');
Route::get('/users/monitors', 'UserController@monitors')->name('users.monitors');
Route::get('/users/guests', 'UserController@guests')->name('users.guests');
Route::get('/users/dealers', 'UserController@dealers')->name('users.dealers');


Route::get('/users/create/{role}', 'UserController@createWithRole')->name('users.create.role');

Route::resource('/users', 'UserController');

