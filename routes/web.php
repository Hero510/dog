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
use App\Http\Controllers\HomeController;
Route::controller(HomeController::class)->group(function() {
    Route::get('home', 'add')->name('home');
});

Auth::routes();

// Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// use App\Http\Controllers\Auth\RegisterController;
// Route::post('register', [RegisterController::class, 'register'])->name('register');
// Route::post('login', [LoginController::class, 'showLoginForm'])->name('login');
