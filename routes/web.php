<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/encode', 'App\Http\Controllers\ProductController@create')->name('encode');
Route::post('/save', 'App\Http\Controllers\ProductController@save')->name('save');

Route::get('/verify', 'App\Http\Controllers\VerificationController@show')->name('verify'); // GET route to display the verify page
Route::post('/verify', 'App\Http\Controllers\VerificationController@verify')->name('verify.check'); // POST route to handle form submission
