<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
/////////////////////////////////////////////////////////////
Route::get('/posts', [PostController::class ,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class , 'create'])->name('posts.create');
Route::post('/posts', [PostController::class ,'store'])->name('posts.store');
Route::post('/posts/update/{post}', [PostController::class ,'update'])->name('posts.update');
Route::get('/posts/{post}', [PostController::class ,'show'])->name('posts.show');
Route::get('/posts/{post}/edit',[ PostController::class ,'edit'])->name('posts.edit');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy']);
///////////////////////////////////////////////////////////////

Route::get('/users' , [UserController::class , 'index']);
Route::get('/users/{user}/edit' , [UserController::class ,'edit']);
Route::patch('/users/{user}' , [UserController::class , 'update']);
