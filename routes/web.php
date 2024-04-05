<?php

use Illuminate\Support\Facades\Route;


// Route::get('/test/{name?}', function($name = 'N/A'){
//     return "Hola, $name";
// });


Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => '/Usuario', 'as' => 'user.', 'controller' => \App\Http\Controllers\UserController::class], function(){
        Route::get('/{user?}', 'form')->name('form'); // user.form

        Route::post('/{user}', 'update')->name('update');
        Route::post('/', 'store')->name('store');
    });
});


Route::group(['middleware' => 'guest', 'controller' => \App\Http\Controllers\Auth\AuthController::class],function(){
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    Route::post('/Authenticate', 'authenticate')->name('authenticate');
    Route::post('/store', 'store')->name('store');
});




