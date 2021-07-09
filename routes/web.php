<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index');

Route::group(['namespace' => 'Auth'], function() {
    Route::get('register', 'CustomerRegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'CustomerRegisterController@register');
    Route::get('login', 'CustomerLoginController@showLoginForm')->name('login');
    Route::post('login', 'CustomerloginController@login');
    Route::post('logout', 'CustomerLoginController@logout')->name('logout');
});

Route::group(['prefix' => 'admin'], function() {
    Route::group(['namespace' => 'Auth'], function() {
        // Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
        // Route::post('register', 'RegisterController@register');
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'loginController@login');
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
    });
    
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'HomeController@index')->name('home');
    });
});


