<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GreenhouseController;
use App\Http\Controllers\PlantController;
use App\Http\Middleware\RoleMiddleware;

// Authentication routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Protected routes for authenticated users
Route::middleware('auth')->group(function () {

    // Common routes accessible to all authenticated users
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/plant-list', [PlantController::class, 'index'])->name('plant-list');
    Route::delete('/greenhouse-manage/{id}', [GreenhouseController::class, 'destroy'])->name('greenhouse-destroy');
    Route::get('/greenhouse-manage/export/{id}', [GreenhouseController::class, 'export'])->name('greenhouse-export');

    // Routes for users with 'user' role
    Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
        Route::get('/get-sensor-data', [HomeController::class, 'getSensorData'])->name('getSensorData');
        Route::get('/greenhouse-manage', [GreenhouseController::class, 'index'])->name('greenhouse-manage');
        Route::post('/greenhouse-manage', [GreenhouseController::class, 'store'])->name('greenhouse-insert');
        Route::post('/greenhouse-manage/add/{id}', [GreenhouseController::class, 'add'])->name('greenhouse-add');
        Route::put('/greenhouse-manage/update/{id}', [GreenhouseController::class, 'update'])->name('greenhouse-update');
        Route::put('/greenhouse-manage/update-pin/{id}', [GreenhouseController::class, 'updatePin'])->name('greenhouse-pin');
    });

    // Routes for users with 'superadmin' role
    Route::middleware([RoleMiddleware::class . ':superadmin'])->group(function () {
        Route::post('/plant-list', [PlantController::class, 'store'])->name('plant-insert');
        Route::delete('/plant-list/{id}', [PlantController::class, 'destroy'])->name('plant-list-destroy');
    });
});
