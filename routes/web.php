<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\InformationCategoriesController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\InformationController;
use App\Http\Controllers\Guest\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth-check')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/profile-delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::resource('user', UserController::class);
    Route::resource('information-categories', InformationCategoriesController::class);
    Route::resource('ae-information', InformationController::class);
});

Route::get('/ae-pustaka', function () {
    return view('admin.dashboard.ae-library.index');
});

Route::get('/ae-pustaka/create', function () {
    return view('admin.dashboard.ae-library.create');
});

Route::get('/ae-pustaka/edit', function () {
    return view('admin.dashboard.ae-library.edit');
});
