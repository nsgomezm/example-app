<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth')->name('home');


Route::group(['controller' => \App\Http\Controllers\Auth\AuthController::class],function(){
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    Route::post('/Authenticate', 'authenticate')->name('authenticate');
});




