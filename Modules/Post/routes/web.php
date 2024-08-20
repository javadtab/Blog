<?php


use Illuminate\Support\Facades\Route;
use Modules\Post\App\Http\Controllers\PostController;
use Modules\Post\App\Http\Controllers\CommentController;
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
Route::get('/posts', [PostController::class ,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class , 'create'])->name('posts.create');
Route::post('/posts/', [PostController::class ,'store'])->name('posts.store');
Route::post('/posts/update/{post}', [PostController::class ,'update'])->name('posts.update');
Route::get('/posts/{post}', [PostController::class ,'show'])->name('posts.show');
Route::get('/posts/{post}/edit',[ PostController::class ,'edit'])->name('posts.edit');
Route::delete('/posts/{post}', [PostController::class, 'destroy']);

#comments route
Route::post('/posts/comments' , [CommentController::class , 'store'])->name('comments.store');
