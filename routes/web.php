<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// Auth routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

//profile routes

Route::get('/profile', [AuthController::class, 'profile'])->name('profile.index');
Route::get('/profile/update/{user}', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::get('/posts/{user}', [AuthController::class ,'showProfile'])->name('profile.show');
Route::post('/profile/{user}/edit', [AuthController::class ,'editProfile'])->name('profile.edit');

//post routes

Route::get('/posts', [PostController::class ,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class , 'create'])->name('posts.create');
Route::post('/posts', [PostController::class ,'store'])->name('posts.store');
Route::post('/posts/update/{post}', [PostController::class ,'update'])->name('posts.update');
Route::get('/posts/{post}', [PostController::class ,'show'])->name('posts.show');
Route::get('/posts/{post}/edit',[ PostController::class ,'edit'])->name('posts.edit');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy']);

// users routes

Route::get('/users' , [UserController::class , 'index'])->name('users');
Route::get('/users/{user}/edit' , [UserController::class ,'edit']);
Route::patch('/users/{user}' , [UserController::class , 'update']);
