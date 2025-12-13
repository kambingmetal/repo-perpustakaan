<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contactIndex'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::get('/profile/sejarah', [App\Http\Controllers\HomeProfileController::class, 'sejarahIndex'])->name('profile.sejarah');
Route::get('/profile/visi-misi', [App\Http\Controllers\HomeProfileController::class, 'visiMisiIndex'])->name('profile.visi-misi');
Route::get('/profile/team', [App\Http\Controllers\HomeProfileController::class, 'teamIndex'])->name('profile.tim');

Route::get('/layanan/jam-layanan', [App\Http\Controllers\HomeLayananController::class, 'jamLayananIndex'])->name('layanan.jam-layanan');
Route::get('/layanan/jenis-layanan', [App\Http\Controllers\HomeLayananController::class, 'jenisLayananIndex'])->name('layanan.jenis-layanan');
Route::get('/layanan/fasilitas', [App\Http\Controllers\HomeLayananController::class, 'fasilitasIndex'])->name('layanan.fasilitas');