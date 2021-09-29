<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name("home");

Route::get('/about', [HomeController::class, 'about'])->name("about");

Route::middleware(['guest'])->group(function () {
    // Регистрация через Microsoft

    Route::get('/signin', [AccountController::class, 'signin'])->name("signin");

    Route::get('/callback', [AccountController::class, 'callback'])->name("callback");

    // Действия с аккаунтом

    Route::match(['get', 'post'], '/login', [AccountController::class, 'login'])->name("login");
});

Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], '/login/add', [AccountController::class, 'add'])->name("loginAdd");

    Route::get('/logout', [AccountController::class, 'logout'])->name("logout");
});

// Пользовательские страницы

Route::middleware(['auth', 'studentConfirm'])->group(function () {
    Route::get("/page/{id?}", [UserController::class, 'page'])->name('page');
});
