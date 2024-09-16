<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\DataSensor;
use app\Http\Controllers\manageController;
use app\Http\Controllers\tanamanController;
use App\Http\Controllers\MqttController;




Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('/', [App\Http\Controllers\DataSensor::class, 'welcome'])->name('welcome');
    
    //manage-greenhouse
    Route::get('/manage-greenhouse', [App\Http\Controllers\manageController::class, 'index'])->name('manageGreenhouse');
    
    Route::post('/store-manage-greenhouse', [App\Http\Controllers\manageController::class, 'store'])->name('storeGreenhouse');
    
    Route::delete('/delete-manage-greenhouse/{id_greenhouse}', [App\Http\Controllers\manageController::class, 'destroy'])->name('destroyGreenhouse');
    
    Route::put('/update-manage-greenhouse/{id_greenhouse}', [App\Http\Controllers\manageController::class, 'update'])->name('updateGreenhouse');
    
    Route::get('/info-manage-greenhouse/{id_greenhouse}', [App\Http\Controllers\manageController::class, 'edit'])->name('editGreenhouse');
    
    //tanaman
    Route::get('/tanaman', [App\Http\Controllers\tanamanController::class, 'index'])->name('Tanaman');
    
    Route::get('/edit-tanaman/{id_tanaman}', [App\Http\Controllers\tanamanController::class, 'edit'])->name('editTanaman');
    
    Route::post('/tambah-tanaman', [App\Http\Controllers\tanamanController::class, 'store'])->name('storeTanaman');
    
    Route::put('/update-tanaman/{id_tanaman}', [App\Http\Controllers\tanamanController::class, 'update'])->name('updateTanaman');
    
    Route::delete('/delete-tanaman/{id_tanaman}', [App\Http\Controllers\tanamanController::class, 'destroy'])->name('destroyTanaman');

});


Route::get('/publish-mqtt', [MqttController::class, 'publishMessage']);
Route::get('/subscribe-mqtt', [MqttController::class, 'subscribeToTopic']);




Route::get('/chart', function () {
    return view('chart');
})->name('chart');

Route::get('/tables', function () {
    return view('tables');
});

// Route::get('/manage-greenhouse', function () {
//     return view('manage-greenhouse');
// })->name('listGreenhouse');

Route::get('/cards', function () {
    return view('cards');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');