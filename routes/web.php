<?php

use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('isLogin')->group(function () {
    // Login
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');
});

// Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('checkLogin')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('task', [TaskController::class, 'index'])->name('task');
    Route::get('task/pdf', [TaskController::class, 'pdf'])->name('taskPdf');

    Route::middleware('isAdmin')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('user/store', [UserController::class, 'store'])->name('userStore');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
        Route::get('user/excel', [UserController::class, 'excel'])->name('userExcel');
        Route::get('user/pdf', [UserController::class, 'pdf'])->name('userPdf');

        // Task
        Route::get('task/create', [TaskController::class, 'create'])->name('taskCreate');
        Route::post('task/store', [TaskController::class, 'store'])->name('taskStore');
        Route::get('task/edit/{id}', [TaskController::class, 'edit'])->name('taskEdit');
        Route::put('task/update/{id}', [TaskController::class, 'update'])->name('taskUpdate');
        Route::delete('task/destroy/{id}', [TaskController::class, 'destroy'])->name('taskDestroy');
        Route::get('task/excel', [TaskController::class, 'excel'])->name('taskExcel');
    });
});
