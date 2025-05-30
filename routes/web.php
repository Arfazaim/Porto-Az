<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController; // Ini tetap dibutuhkan
use App\Http\Controllers\Admin\AboutMeController; 
use App\Http\Controllers\Admin\SkillController; 
use App\Http\Controllers\Admin\ExperienceController; 
use App\Http\Controllers\Admin\ProjectController; 
use App\Http\Controllers\Admin\ContactController; 


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// --- Public Portfolio Routes ---
// Ini adalah route yang bisa diakses oleh siapa saja tanpa login

// Route untuk halaman utama portfolio
// Mengganti route default '/' agar menampilkan portfolio
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

// Route untuk halaman detail proyek
// Perhatikan URL-nya saya ubah menjadi '/projects/{slug}' agar lebih jelas
Route::get('/projects/{slug}', [PortfolioController::class, 'showProject'])->name('portfolio.project.show');


// --- Laravel Breeze Authentication Routes ---
// Ini adalah route bawaan Breeze untuk login, register, dll. Jangan dihapus.
require __DIR__.'/auth.php';


// --- Authenticated User Routes (Dashboard & Profile) ---
// Route yang hanya bisa diakses oleh pengguna yang sudah login
Route::middleware(['auth', 'verified'])->group(function () {
    // Route untuk dashboard (setelah login)
    // Ini bisa menjadi halaman dashboard admin kamu
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route untuk manajemen Profil pengguna (bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route untuk halaman admin
    // Route ini hanya bisa diakses oleh admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('about-me', App\Http\Controllers\Admin\AboutMeController::class)->except(['show']); // about-me biasanya tidak ada show detail
        Route::resource('skills', App\Http\Controllers\Admin\SkillController::class);
        Route::resource('experiences', App\Http\Controllers\Admin\ExperienceController::class);
        Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
        Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class)->except(['show']); // contacts juga biasanya tidak ada show detail
    });
});