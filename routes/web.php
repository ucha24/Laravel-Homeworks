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
use Illuminate\Support\Facades\DB;
Route::get('/', function () {
    return view('welcome');
});

Route::get("raw-join-example",function(){
    $examplejoin = DB::table('clients')
    ->join('cities', 'clients.city_id', '=', 'cities.id')
    ->select('cities.id as city_id','cities.name as city_name', 'clients.*')
    ->get();

    return response()->json($examplejoin);
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

    Route::resource('clients','ClientController')->middleware('male');
    Route::post('cities','HomeController@addCity')->name('cities.store');
});
Route::get('/home', 'HomeController@index')->name('home');
