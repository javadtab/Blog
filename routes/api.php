<?php

use App\Http\Controllers\Api\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;


Route::get('/users', [UsersController::class, 'index']);
Route::post('/users', [UsersController::class, 'store']);
Route::get('/users/{user}', [UsersController::class, 'show']);
Route::put('/users/{user}', [UsersController::class, 'update']);
Route::delete('/users/{user}', [UsersController::class, 'destroy']);


Route::get('/posts', [PostsController::class, 'index']);
Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts/{post}', [PostsController::class, 'show']);
Route::put('/posts/{post}', [PostsController::class, 'update']);
Route::delete('/posts/{post}', [PostsController::class, 'destroy']);
