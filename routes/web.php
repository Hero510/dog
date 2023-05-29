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
});

use App\Http\Controllers\Dog\UserController;
    Route::controller(UserController::class)->group(function() {
    Route::get('user/{id}/edit', 'edit')->name('user.edit');
    Route::post('user/{id}', 'update')->name('user.update');
});

use App\Http\Controllers\Dog\DogController;
    Route::controller(DogController::class)->group(function() {
    Route::get('dog/create', 'add')->name('dog.add');
    Route::post('dog/create', 'create')->name('dog.create');
    Route::post('image-crop', 'imageCropPost')->name("imageCrop");
    Route::get('dog/edit', 'edit')->name('dog.edit');
    Route::post('dog/edit', 'update')->name('dog.update');
});

use App\Http\Controllers\Dog\PostController;
    Route::controller(PostController::class)->group(function() {
    Route::get('post/create', 'add')->name('post.add')->middleware('auth');
    Route::post('post/create', 'create')->name('post.create')->middleware('auth');
    Route::post('image-crop', 'imageCropPost')->name("imageCrop");
    Route::get('post/index', 'index')->name('post.index'); 
    Route::get('post/edit', 'edit')->name('post.edit');
    Route::post('post/edit', 'update')->name('post.update');
    Route::get('post/delete', 'delete')->name('post.delete');
});

// use App\Http\Controllers\Dog\ImageCropController;
//     Route::controller(ImageCropController::class)->group(function() {
// });

Auth::routes();

// Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// use App\Http\Controllers\Auth\RegisterController;
// Route::post('register', [RegisterController::class, 'register'])->name('register');
// Route::post('login', [LoginController::class, 'showLoginForm'])->name('login');
