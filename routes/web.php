<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/sejarah', [App\Http\Controllers\HomeProfileController::class, 'sejarahIndex'])->name('profile.sejarah');