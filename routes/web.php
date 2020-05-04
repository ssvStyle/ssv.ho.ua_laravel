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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/record', 'RecordCurrentDate@getTime' );

Route::get('/record/{date}', 'RecordChosenDate@getTime' );


Route::get('/service', function () {
    return view('service');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/login', function () {
    return view('login');
});

//Route::get('/test', 'Test@run');

Route::post('/addRecord', 'Record@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
