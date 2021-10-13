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

    Route::match(['get', 'post'], '/auth/{message?}', [AccountController::class, 'login'])->name("login");
});

Route::middleware(['auth'])->group(function () {

    Route::match(['get', 'post'], '/data/add', [AccountController::class, 'add'])->name("loginAdd");

    Route::get('/logout', [AccountController::class, 'logout'])->name("logout");
});

Route::middleware(['auth', 'studentConfirm'])->group(function () {

    // Пользователь

    Route::get("/page/{id?}", [UserController::class, 'page'])->name('page');

    // Группы

    Route::get("/group/one/{id}", [GroupController::class, 'index'])->name('group');

    Route::get("/group/all", [GroupController::class, 'all'])->name('all');

    // Расписание

    Route::get("/schedule/list/{groupId}/{day}/{month}/{year}", [LessonController::class, 'list'])->name('lessonList');

    Route::get("/schedule/all/{groupId}", [LessonController::class, 'full'])->name('fullSchedule');
});
