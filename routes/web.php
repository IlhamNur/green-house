<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GreenhouseController;
use App\Http\Controllers\PlantController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Protected routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/greenhouse-manage', [GreenhouseController::class, 'index'])->name('greenhouse-manage');
    Route::get('/plant-list', [PlantController::class, 'index'])->name('plant-list');
});
