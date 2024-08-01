<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\AdminController;

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

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//user
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::post('/profile', [UserController::class, 'updateProfile']);
Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('changePassword');

//admin
Route::get('/admin/users', [AdminController::class, 'listUsers'])->middleware('admin')->name('admin.users');
Route::post('/admin/users/{id}/toggle-active', [AdminController::class, 'toggleUserActive'])->middleware('admin')->name('admin.toggleUserActive');
