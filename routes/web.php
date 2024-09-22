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
    Route::get('/get-sensor-data', [HomeController::class, 'getSensorData'])->name('getSensorData');
    Route::get('/greenhouse-manage', [GreenhouseController::class, 'index'])->name('greenhouse-manage');
    Route::get('/plant-list', [PlantController::class, 'index'])->name('plant-list');

    Route::post('/greenhouse-manage', [GreenhouseController::class, 'store'])->name('greenhouse-insert');
    Route::put('/greenhouse-manage/update-pin/{id}', [GreenhouseController::class, 'updatePin'])->name('greenhouse-pin');
    Route::put('/greenhouse-manage/update/{id}', [GreenhouseController::class, 'update'])->name('greenhouse-update');
    Route::delete('/greenhouse-manage/{id}', [GreenhouseController::class, 'destroy'])->name('greenhouse-destroy');
    Route::get('/greenhouse-manage/export/{id}', [GreenhouseController::class, 'export'])->name('greenhouse-export');
});
