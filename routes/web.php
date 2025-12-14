<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProfileController;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/kegiatan', function () {
    return view('kegiatan');
})->name('kegiatan');

Route::get('/presensi', function () {
    return view('presensi');
})->name('presensi');

Route::resource('pengurus', PengurusController::class);
Route::resource('kegiatan', KegiatanController::class);