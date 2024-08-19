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
Route::get('/users' , [UserController::class , 'index'])->name('users');
Route::post('/users/updatePermision/{user}' , [UserController::class , 'updatePermision']);
Route::post('/users/update/{user}' , [UserController::class , 'update']);
Route::get('/users/{user}', [UserController::class ,'show']);
Route::get('/users.admin/{user}/edit' , [UserController::class ,'edit']);
Route::get('/users/{user}/permision' , [UserController::class ,'permision']);
Route::delete('/users/{user}/delete', [UserController::class, 'destroy']);
