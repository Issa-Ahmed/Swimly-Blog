<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Author\ArticleController;
use App\Http\Controllers\Author\CategoryController;
use App\Http\Controllers\Author\DashboardController;
use App\Http\Controllers\Author\UserController;
use App\Http\Controllers\Author\TagController;

Route::get('/', function () {
    return view('home');
});


Route::middleware(['auth','author'])->name('dashboard.')->prefix('dashboard')->group(function(){
    Route::get('/', [DashboardController::class , 'index'])->name('index');
    Route::resource('/users' , UserController::class);
    Route::resource('/articles' , ArticleController::class);
    Route::resource('/categories' , CategoryController::class);
    Route::resource('/tags' , TagController::class);
    
});

require __DIR__.'/auth.php';
