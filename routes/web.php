<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = auth()->user();

    return view('welcome', compact('user'));

})->middleware('auth')->name('home');

Route::get('/test', function(){
    auth()->logout();
});

Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => 'guest', 'controller' => \App\Http\Controllers\Auth\AuthController::class],function(){
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/Authenticate', 'authenticate')->name('authenticate');
    Route::post('/store', 'store')->name('store');
});




