<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\InformationController;
use App\Http\Controllers\Dashboard\InformationCategoriesController;
use App\Http\Controllers\Dashboard\LibrariesController;
use App\Http\Controllers\Dashboard\LibraryCollectionController;
use App\Http\Controllers\Guest\GuestInformationController;
use App\Http\Controllers\Guest\GuestLibraryController;
use App\Http\Controllers\Guest\ContactController;
#use App\Http\Controllers\Guest\CalendarController;
use App\Http\Controllers\Dashboard\KegiatanController;
use Spatie\Sitemap\SitemapGenerator;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::get('/prodi-d4-trmo', [HomeController::class, 'd4mekatronika'])->name('prodi-d4-trmo');
Route::get('/prodi-d4-tro', [HomeController::class, 'd4otomasi'])->name('prodi-d4-tro');
Route::get('/prodi-d4-trin', [HomeController::class, 'd4trin'])->name('prodi-d4-trin');
Route::get('/prodi-d4-trsa', [HomeController::class, 'd4trsa'])->name('prodi-d4-trsa');
Route::get('/prodi-s2t-siber-fisik', [HomeController::class, 's2tsiberfisik'])->name('prodi-s2t-siber-fisik');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/ae-informasi', [GuestInformationController::class, 'index'])->name('guest.information.index');
Route::get('/ae-informasi/detail/{informasi:slug}', [GuestInformationController::class, 'show'])->name('guest.information.detail');
Route::get('/ae-pustaka', [GuestLibraryController::class,'index'])->name('guest.library.index');
Route::get('/ae-pustaka/detail/{libraries:slug}', [GuestLibraryController::class, 'show'])->name('guest.library.detail');

// Manajemen Jadwal Kegiatan
Route::middleware(['auth-check', 'permission:kegiatan.view'])->group(function () {

    Route::get('/ae-kegiatan/kategori', [KegiatanController::class, 'kategori'])
        ->name('ae-kegiatan.kategori');

    Route::get('/ae-kegiatan', [KegiatanController::class, 'index'])
        ->name('ae-kegiatan.index');

    Route::get('/ae-kegiatan/create', [KegiatanController::class, 'create'])
        ->middleware('permission:kegiatan.create')
        ->name('ae-kegiatan.create');

    Route::post('/ae-kegiatan', [KegiatanController::class, 'store'])
        ->middleware('permission:kegiatan.create')
        ->name('ae-kegiatan.store');

    Route::get('/ae-kegiatan/{ae_kegiatan}/edit', [KegiatanController::class, 'edit'])
        ->middleware('permission:kegiatan.update')
        ->name('ae-kegiatan.edit');

    Route::put('/ae-kegiatan/{ae_kegiatan}', [KegiatanController::class, 'update'])
        ->middleware('permission:kegiatan.update')
        ->name('ae-kegiatan.update');

    Route::delete('/ae-kegiatan/{ae_kegiatan}', [KegiatanController::class, 'destroy'])
        ->middleware('permission:kegiatan.delete')
        ->name('ae-kegiatan.destroy');
});

Route::middleware('auth-check')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/profile-delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
});

Route::middleware(['auth-check', 'role:admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
});

Route::middleware(['auth-check', 'permission:information.view'])->group(function () {
    Route::resource('ae-information', InformationController::class);
    Route::resource('information-categories', InformationCategoriesController::class);
});

Route::middleware(['auth-check', 'permission:library.view'])->group(function () {
    Route::resource('ae-library', LibrariesController::class);
    Route::resource('library-collection', LibraryCollectionController::class);
});

// Penambahan route kalender
#Route::get('/kalender-kegiatan', [CalendarController::class, 'index'])
#    ->name('guest.calendar.index');
