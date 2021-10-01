<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name("home");

Route::get('/about', [HomeController::class, 'about'])->name("about");

Route::get('/privacy', [HomeController::class, 'privacy'])->name("privacy");

Route::middleware(['guest'])->group(function () {

    Route::get('/signin', [AccountController::class, 'signin'])->name("signin");

    Route::get('/callback', [AccountController::class, 'callback'])->name("callback");

    Route::match(['get', 'post'], '/login{message?}', [AccountController::class, 'login'])->name("login");
});

Route::middleware(['auth'])->group(function () {

    Route::match(['get', 'post'], '/login/add', [AccountController::class, 'add'])->name("loginAdd");

    Route::get('/logout', [AccountController::class, 'logout'])->name("logout");
});

Route::middleware(['auth', 'studentConfirm'])->group(function () {

    // Пользователь

    Route::get("/page/{id?}", [UserController::class, 'page'])->name('page');

    // Группы

    Route::get("/group/{id}", [GroupController::class, 'index'])->name('group');

    Route::get("/all", [GroupController::class, 'all'])->name('all');

    // Расписание

    Route::get("/list/{groupId}/{day}/{month}/{year}", [LessonController::class, 'list'])->name('lessonList');

    Route::get("/all/{groupId}", [LessonController::class, 'full'])->name('fullSchedule');
});
