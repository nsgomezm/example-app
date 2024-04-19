<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


 Route::get('/test', function(){
     $user = auth()->user();
     \Illuminate\Support\Facades\Mail::to(auth()->user()->email)->send(new \App\Mail\WelcomeEmail($user));

     return "true";
 });


Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');


//Route::get('/user/showPhoto/{personalInformation}', function(Request $request, \App\Models\UserPersonalInformation $personalInformation){
//    if (! $request->hasValidSignature()) {
//        abort(401);
//    }
//
//    return $personalInformation;
//
//    return 'test';
//})->name('showPhoto');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

    Route::group(['prefix' => '/Usuario', 'as' => 'user.', 'controller' => \App\Http\Controllers\UserController::class], function(){
        Route::get('/enviar-notificacion', 'sendNotification')->name('send-verified-email');

        Route::get('/{user?}', 'form')->name('form'); // user.form
        Route::post('/{user}', 'update')->name('update');
        Route::post('/', 'store')->name('store');


    });

    Route::get('/verification/{id}/{hash}', [\App\Http\Controllers\UserController::class, 'verifyEmail'])
        ->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');

});


Route::group(['middleware' => 'guest', 'controller' => \App\Http\Controllers\Auth\AuthController::class],function(){
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    Route::post('/Authenticate', 'authenticate')->name('authenticate');
    Route::post('/store', 'store')->name('store');
});




