<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\DataSensor;

Route::get('/', [App\Http\Controllers\DataSensor::class, 'welcome'])->name('welcome');

Route::get('/chart', function () {
    return view('chart');
})->name('chart');

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/buttons', function () {
    return view('buttons');
});

Route::get('/cards', function () {
    return view('cards');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');