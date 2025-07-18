<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminHome;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Livewire\Book\BookBorrowList;
use App\Livewire\Book\UserDisplay;
use App\Livewire\BookStats;
use App\Livewire\Category\CategoryCreate;
use App\Livewire\Category\CategoryDisplay;
use App\Livewire\Category\CategoryDisplayTable;
use App\Livewire\Category\CategoryTable;
use App\Livewire\Category\CategoryUpdate;
use App\Livewire\CategoryCrud;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('userHome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');

// Logout route (available to authenticated users)
Route::match(['GET', 'POST'], '/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Routes for users
Route::middleware(['auth', 'user'])->group(function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('userHome');
    Route::get('/book_borrow/{book}', [BookController::class, 'book_borrow'])->name('book.borrow');
    Route::get('/bookhistory', [HomeController::class, 'history'])->name('book.history');
});

// Routes for admins
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminhome', [AdminController::class, 'home'])->name('adminHome');
    Route::get('/adminIndex', BookStats::class)->name('adminIndex');
    // Category routes (admin only)
    Route::get('/category_add', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category_add', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');

    // Book routes (admin only)
    Route::get('/book', [BookController::class, 'index'])->name('book.index');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::get('/book_create', [BookController::class, 'create'])->name('book.create');
    Route::get('/book_edit/{bid}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/{book}/update', [BookController::class, 'update'])->name('book.update');

    Route::delete('/book/{book}/delete', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('/book_request', [BookController::class, 'request'])->name('book.request');
    Route::get('/book_approve/{id}', [BookController::class, 'approve'])->name('book.approve');
    Route::get('/book_rejected/{id}', [BookController::class, 'reject'])->name('book.reject');
    Route::get('/book_return/{id}', [BookController::class, 'return'])->name('book.return');
});


//livewire
// Route::get('/adminCategory', CategoryCrud::class)->name('admin.category');
Route::get('/adminCategory', CategoryDisplay::class)->name('admin.category');
Route::get('/categorycreate', CategoryCreate::class)->name('admin.category.create');
Route::get('/categorytable', CategoryTable::class)->name('admin.category.table');
Route::get('/categoryUpdate/{id}', CategoryUpdate::class)->name('admin.category.update');

Route::get('/borrowlist', BookBorrowList::class)->name('admin.book.borrow');

// Route::get('/userDisplay', UserDisplay::class)->name('user.book.display');
