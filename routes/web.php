<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;

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
 * Login routes 
 * */
Route::middleware('guest')->group(function(){

    Route::get('/login', [LoginController::class, 'getLoginFrom'])->name('get-login-form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

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
Route::get('/', function(){
    dd('jjvnjnjnnnnnnnnnnnnnnnnnnnnnnnnn');
})->name('web.home');

