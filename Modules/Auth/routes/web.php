<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\App\Http\Controllers\AuthController;

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
Route::get('/', function () {
    return view('Auth::welcome');
})->name('welcome');
Route::get('/',[AuthController::class, 'welcome'])->name('welcome');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile.index');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

#profile routes
Route::post('/profile/update/{user}' ,[AuthController::class, 'updateProfile'])->name('profile.update');
Route::get('/profile/{user}', [AuthController::class, 'showProfile'])->name('profile.show');
Route::get('/profile/{user}/edit' , [AuthController::class, 'editProfile'])->name('profile.edit');
