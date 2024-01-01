<?php

use App\Http\Controllers\auth\LoginController as LoginController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::post('logout', [LoginController::class, 'destroy'])->name('login.destroy');