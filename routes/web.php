<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
use App\Http\Controllers\Dog\HomeController;
    Route::controller(HomeController::class)->group(function() {
    Route::get('home', 'index')->name('home');
    
});

use App\Http\Controllers\Dog\MypageController;
    Route::controller(MypageController::class)->group(function() {
    Route::get('mypage', 'index')->name('mypage');
    Route::get('dog/create','create')->name('dog.create');
});

use App\Http\Controllers\Dog\UserController;
    Route::get('user/{id}/edit', [UserController::class,'edit'])->name('user.edit');
    Route::put('user/{user}', [UserController::class,'update'])->name('user.update');


Auth::routes();

// Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// use App\Http\Controllers\Auth\RegisterController;
// Route::post('register', [RegisterController::class, 'register'])->name('register');
// Route::post('login', [LoginController::class, 'showLoginForm'])->name('login');
