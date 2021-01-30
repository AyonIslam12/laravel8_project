<?php

use App\Http\Controllers\Frontend\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/post',[SiteController::class,'singlePost']);

//User Login Register Route
Route::prefix('user')->name('user.')->group(function(){
    Route::get('/login',[SiteController::class,'showLoginForm'])->name('login-form');
    Route::post('/login',[SiteController::class,'login'])->name('login');
    Route::get('/logout',[SiteController::class,'logout'])->name('logout');
    Route::get('/register',[SiteController::class,'showRegisterFrom'])->name('register-form');
    Route::post('/register',[SiteController::class,'registration'])->name('registration');

});
