<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\InformationCategoriesController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\InformationController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\GuestInformationController;
use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\Dashboard\LibrariesController;
use App\Http\Controllers\Dashboard\LibraryCollectionController;
use App\Http\Controllers\Guest\GuestLibrariesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::get('/prodi-d2-trmo', [HomeController::class, 'd2mekatronika'])->name('prodi-d2-trmo');
Route::get('/prodi-d4-trmo', [HomeController::class, 'd4mekatronika'])->name('prodi-d4-trmo');
Route::get('/prodi-d4-tro', [HomeController::class, 'd4otomasi'])->name('prodi-d4-tro');
Route::get('/prodi-d4-trin', [HomeController::class, 'd4trin'])->name('prodi-d4-trin');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/ae-informasi', [GuestInformationController::class, 'index'])->name('guest.information.index');
Route::get('/ae-informasi/detail/{informasi:slug}', [GuestInformationController::class, 'show'])->name('guest.information.detail');

Route::get('/ae-pustaka', [GuestLibrariesController::class,'index'])->name('pustaka');

Route::get('/ae-pustaka/detail/{libraries:slug}', [GuestLibrariesController::class, 'show'])->name('pustaka-detail');

Route::middleware('auth-check')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/profile-delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::resource('user', UserController::class);
    Route::resource('ae-information', InformationController::class);
    Route::resource('ae-library',LibrariesController::class);
    Route::resource('information-categories', InformationCategoriesController::class);
    Route::resource('library-collection',LibraryCollectionController::class);
});

