<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () { // only admin users
    Route::resource('products', ProductController::class)->except(['index', 'show']);
    Route::resource('users', UserController::class);
});


Route::middleware(['auth'])->group(function () { // registered users
    Route::resource('orders', OrderController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// all
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');



// guest only
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware(['auth', 'isAdmin'])->group(function () { // only admin users
    Route::resource('products', ProductController::class)->except(['index', 'show']);
    Route::resource('users', UserController::class);
});
