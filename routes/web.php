<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;


Route::get('/roles' ,[ RoleController::class, 'index'])->name('role');
Route::post('/roles' ,[ RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/create', [RoleController::class , 'create'])->name('roles.create');
Route::post('/roles/update/{role}', [RoleController::class ,'update'])->name('roles.update');
Route::get('/roles/{role}', [RoleController::class ,'show'])->name('roles.show');
Route::get('/roles/{role}/edit',[ RoleController::class ,'edit'])->name('roles.edit');
Route::delete('/roles/delete/{role}', [RoleController::class, 'destroy']);

Route::get('/users.admin/{user}/setRole' , [RoleController::class ,'setRole']);
Route::put('/users.admin/setRole/store', [RoleController::class, 'assignRole'])->name('assign.role');

Route::get('/users/setRole' ,[ RoleController::class, 'setRole'])->name('setRole');
Route::post('/users/setRole' ,[ RoleController::class, 'setRole2'])->name('setRole2');
Route::get('/Permissionfor' ,[RoleController::class, 'addPermission']);

# Auth routes

#profile routes

#comments route

#post routes

#users routes
