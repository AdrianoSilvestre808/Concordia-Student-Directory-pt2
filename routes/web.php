<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForumPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetLocale;

// Language switcher route
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'fr'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');

// Home redirect
Route::get('/', function () {
    return redirect()->route('login.form');
});

// Authentication routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login.form');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

// Protected routes with locale middleware
Route::middleware(['web', 'auth', SetLocale::class])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        $user = auth()->user();
        $student = $user->student;
        return view('dashboard', compact('user', 'student'));
    })->name('dashboard');

    // Student resource routes
    Route::resource('students', StudentController::class);

    // Forum resource routes (single clean definition)
    Route::resource('forum', ForumPostController::class);
});