<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Web\WebHomeController;
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
 * Auth routes 
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
Route::middleware(['auth', 'role:admin|employee'])->prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
    // Route::middleware(['auth'])->prefix('admin')->name('admin.')->namespace('Admin')->group(function(){
    
    // hoe route
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Users and alboms routes
    Route::resource('users', UserController::class)->except(['create', 'store']);
    Route::get('view-albom/{id}', [App\Http\Controllers\Admin\UserController::class, 'viewAlbom'])->name('view-albom');
    Route::delete('delete-albom/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteAlbom'])->name('delete-albom');
    Route::delete('delete-image/{id}', [App\Http\Controllers\Admin\UserController::class, 'deleteImage'])->name('delete-image');

    // Employees routes
    Route::resource('employees', EmployeeController::class)->except(['show']);

    // Roles routes
    Route::resource('roles', RoleController::class);
});


/**
 * Website
 */
Route::name('web.')->namespace('Web')->group(function(){

    Route::get('/', [WebHomeController::class, 'index'])->name('home');

    // Route::middleware(['auth', 'role:user'])->group(function(){

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('profile', [ProfileController::class, 'updateProfile'])->name('update-profile');

        Route::resource('alboms', AlbomController::class);

        Route::resource('images', ImageController::class)->only(['destroy']);
    // });
});

/**
 * users CRUD
 * alboms CRUD
 * roles CRUD
 * website
 * settings
 */

