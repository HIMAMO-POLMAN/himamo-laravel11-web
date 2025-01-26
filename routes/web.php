<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\InformationCategoriesController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\InformationController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Dashboard\LibrariesController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth-check')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/profile-delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::resource('user', UserController::class);
    Route::resource('information-categories', InformationCategoriesController::class);
    Route::resource('ae-information', InformationController::class);
    Route::resource('ae-pustaka',LibrariesController::class)->except(['edit','update','destroy']);
    Route::get('/ae-pustaka/edit/{libraries:slug}', [LibrariesController::class, 'edit'])->name('ae-pustaka.edit');
    Route::put('/ae-pustaka/update/{libraries:slug}', [LibrariesController::class, 'update'])->name('ae-pustaka.update');
    Route::delete('/ae-pustaka/delete/{libraries:slug}', [LibrariesController::class, 'destroy'])->name('ae-pustaka.destroy');
});
