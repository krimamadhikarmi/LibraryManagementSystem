<?php

use App\Http\Controllers\AdminHome;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/adminhome', [AdminHome::class, 'home']);
//category
Route::get('/category_add', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category_add', [CategoryController::class, 'store'])->name('category.store');
