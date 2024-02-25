<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CommentController;

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

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', DashboardController::class);
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/post', PostController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/media', MediaController::class);
    Route::resource('/admin/comment', CommentController::class);
});

Route::get('/', [HomeController::class, 'index']);
Route::post('/{slug}/comment', [HomeController::class, 'comment']);
Route::get('/category/{category:slug}', [HomeController::class, 'category'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/post', [HomeController::class, 'all']);
Route::get('/{slug}', [HomeController::class, 'post']);
