<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/user/{id}/posts', [UserController::class, 'showPostByUser'])->name('user.posts');

Route::get('/user/{id}/posts/create', [PostController::class, 'create'])->name('user.posts.create');
Route::post('/user/{id}/posts', [PostController::class, 'store'])->name('user.posts.store');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/users/{userId}/profile/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/users/{userId}/profile', [ProfileController::class, 'update'])->name('profiles.update');
Route::get('/users/{userId}/profile', [ProfileController::class, 'show'])->name('profiles.show');


Route::get('/profiles/{userId}', [ProfileController::class, 'show'])->name('profiles.show');
