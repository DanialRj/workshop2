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
    Route::group(['namespace' => 'Auth', 'as' => 'admin.'], function() {
        // Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
        // Route::post('register', 'RegisterController@register');
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'loginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });
    
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('customers', 'CustomerController@index')->name('admin.customers');
        Route::get('products', 'ProductController@index')->name('admin.products');
        Route::get('transactions', 'TransactionController@index')->name('admin.transactions');

        Route::group(['prefix' => 'categories'], function() {
            Route::get('/', 'CategoryController@index')->name('admin.categories');
            Route::get('create', 'CategoryController@create')->name('admin.categories.create');
            Route::post('create', 'CategoryController@store');
            Route::get('{id}/edit', 'CategoryController@edit')->name('admin.categories.edit');
            Route::put('{id}/edit', 'CategoryController@update');
            Route::delete('{id}/delete', 'CategoryController@destroy')->name('admin.categories.destroy');
        });
        
    });
});


