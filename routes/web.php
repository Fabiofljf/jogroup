<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', function () {
    return view("guest.home");
})->name('front.home');

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    // Admin Dashboard
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('person', 'PersonController');

    Route::resource('dettail', 'DettailController');
    
});

Route::get("{any?}", function () {
    return view("guest.home");
})->where("any", ".*");