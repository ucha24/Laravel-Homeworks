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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'guest'], function () {
    Route::get('welcome', function () {
        return "Shen ar xar avtorizebuli";
    });
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('user/profile', function () {
        return Auth::user();
    });
});
Route::get('/home', 'HomeController@index')->name('home');
