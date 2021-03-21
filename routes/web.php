<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return ['hello'=>1, 'hi'=>2 ];
});

Route::get('/', function () { 
    return "test";
});

// Route::get('/user', [UserController::class, 'index']);

Route::get('/books', [BookController::class, 'index'])->name('books');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
Route::get('/books/show', [BookController::class, 'show'])->name('books.show');
Route::get('/books/edit', [BookController::class, 'edit'])->name('books.edit');
Route::post('/books/update', [BookController::class, 'update'])->name('books.update');
Route::post('/books/destroy', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
