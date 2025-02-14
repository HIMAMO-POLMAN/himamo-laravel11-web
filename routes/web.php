<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\guestInformasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Informasi\InformasiController;
use App\Http\Controllers\Informasi\Kategori_Informasi\KategoriInformasiController;
use App\Http\Controllers\Pustaka\PustakaController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get('/prodi-d2-trmo', [HomeController::class, 'd2mekatronika'])->name('prodi-d2-trmo');
Route::get('/prodi-d4-trmo', [HomeController::class, 'd4mekatronika'])->name('prodi-d4-trmo');
Route::get('/prodi-d4-tro', [HomeController::class, 'd4otomasi'])->name('prodi-d4-tro');
Route::get('/prodi-d4-trin', [HomeController::class, 'd4trin'])->name('prodi-d4-trin');
Route::get('/about', [HomeController::class, 'about'])->name('about');


Route::get('/ae-pustaka', function () {
    return view('guest.pustaka');
});
Route::get('/ae-pustaka/detail', function () {
    return view('guest.book-detail');
});
// Rute untuk guest informasi
Route::get('/ae-informasi', [guestInformasiController::class, 'informasi'])->name('guest.information.index');
Route::get('/ae-informasi/detail/{informasi:slug}', [guestInformasiController::class, 'show'])->name('guest.information.detail');

// Home Controller
Route::get('/', [HomeController::class, 'index'])->name('landing-page');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute-rute untuk admin
    Route::middleware('admin')->group(function () {
        // Rute-rute CRUD informasi
        Route::resource('user', UserController::class);
    });

    // Middleware untuk petugas (hanya CRUD informasi)
    Route::middleware('petugas')->group(function () {
        Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
        Route::get('/informasi/create', [InformasiController::class, 'create'])->name('informasi.create');
        Route::post('/informasi/store', [InformasiController::class, 'store'])->name('informasi.store');
        Route::get('/informasi/edit/{informasi:slug}', [InformasiController::class, 'edit'])->name('informasi.edit');
        Route::put('/informasi/update/{informasi:slug}', [InformasiController::class, 'update'])->name('informasi.update');
        Route::delete('/informasi/delete/{informasi:slug}', [InformasiController::class, 'destroy'])->name('informasi.destroy');
        Route::get('/informasi/detail/{informasi:slug}', [InformasiController::class, 'show'])->name('informasi.detail');

        Route::get('/pustaka', [PustakaController::class, 'index'])->name('pustaka.index');
        Route::get('/pustaka/create', [PustakaController::class, 'create'])->name('pustaka.create');
        Route::post('/pustaka/store', [PustakaController::class, 'store'])->name('pustaka.store');
        Route::get('/pustaka/edit/{pustaka:slug}', [PustakaController::class, 'edit'])->name('pustaka.edit');
        Route::put('/pustaka/update/{pustaka:slug}', [PustakaController::class, 'update'])->name('pustaka.update');
        Route::delete('/pustaka/delete/{pustaka:slug}', [PustakaController::class, 'destroy'])->name('pustaka.destroy');
        Route::resource('kategori_informasi', KategoriInformasiController::class);
    });
});


require __DIR__ . '/auth.php';
