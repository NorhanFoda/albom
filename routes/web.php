<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Web\AlbomController;
use App\Http\Controllers\Web\ProfileController;

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

/** 
 * Admin auth routes 
 * */
Route::middleware('guest')->group(function(){

    Route::get('login', [LoginController::class, 'getLoginFrom'])->name('get-login-form');
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::get('singup', [RegisterController::class, 'getRegisterForm'])->name('get-register-form');
    Route::post('singup', [RegisterController::class, 'regsiter'])->name('register');

});

/**
 * Admin routes
 */
Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
    
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class)->except(['create', 'store']);
    
});


/**
 * Website
 */
Route::name('web.')->namespace('Web')->group(function(){

    Route::get('/', [AlbomController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function(){

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    });
});

/**
 * users CRUD
 * alboms CRUD
 * roles CRUD
 * website
 * settings
 */

