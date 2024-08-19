<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Modules\Users\App\Http\Controllers\UsersController;

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
Route::get('/users' , [UsersController::class , 'index'])->name('users');
Route::post('/users/updatePermision/{user}' , [UsersController::class , 'updatePermision']);
Route::post('/users/update/{user}' , [UsersController::class , 'update']);
Route::get('/users/{user}', [UsersController::class ,'show']);
Route::get('/users.admin/{user}/edit' , [UsersController::class ,'edit']);
Route::get('/users/{user}/permision' , [UsersController::class ,'permision']);
Route::delete('/users/{user}/delete', [UsersController::class, 'destroy']);
