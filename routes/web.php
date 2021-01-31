<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\SiteController;
use Illuminate\Support\Facades\Route;


Route::get('/',[SiteController::class,'index'])->name('index');
Route::get('/post',[SiteController::class,'singlePost']);

//User Login & Register Route
Route::prefix('user')->name('user.')->group(function(){
    Route::get('/login',[SiteController::class,'showLoginForm'])->name('login-form');
    Route::post('/login',[SiteController::class,'login'])->name('login');
    Route::get('/logout',[SiteController::class,'logout'])->name('logout');
    Route::get('/register',[SiteController::class,'showRegisterFrom'])->name('register-form');
    Route::post('/register',[SiteController::class,'registration'])->name('registration');

});
//Admin Route
Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::prefix('category')->name('category.')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::delete('/{id}',[CategoryController::class,'destroy'])->name('destroy');
    });
});
