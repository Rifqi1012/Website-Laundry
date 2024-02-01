<?php

use App\Http\Controllers\DataAmbilController;
use App\Http\Controllers\DataInvenController;
use App\Http\Controllers\DataOrderController;
use App\Http\Controllers\dataUtamaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPaketController;


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashboard', [DashboardController::class, 'view'])->name('dashboard');
// Route::get('/login', [LoginController::class, 'view']);

// Rute Login Dan Regis
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'view'])->name('login');
    Route::get('/regis', [RegisController::class, 'view']);
    Route::post('/regis', [RegisController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('masuk');
});

Route::middleware(['auth'])->group(function () {
    // Route Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Route datapaket
    Route::get('/datapaket', [DataPaketController::class, 'view'])->name('datapaket');
    Route::post('/datapaket/tambah', [DataPaketController::class, 'tambah'])->name('tambahDP');
    Route::put('/datapaket/update/{id}', [DataPaketController::class, 'update'])->name('updateDP');
    Route::delete('/datapaket/hapus/{id}', [DataPaketController::class, 'hapus'])->name('hapusDP');

    // Route dataorder
    Route::get('/dataorder', [DataOrderController::class, 'view'])->name('dataorder');
    Route::post('/dataorder/tambah', [DataOrderController::class, 'tambah'])->name('tambahDO');
    Route::put('/dataorder/update/{id}', [DataOrderController::class, 'update'])->name('updateDO');
    Route::delete('/dataorder/hapus/{id}', [DataOrderController::class, 'hapus'])->name('hapusDO');
    Route::put('/dataorder/update_status/{id}', [DataOrderController::class, 'updateStatus'])->name('updateStatusDO');

    //Route dataAmbil
    Route::get('/dataambil', [DataAmbilController::class, 'view'])->name('dataambil');
    Route::put('/dataambil/update_status/{id}', [DataAmbilController::class, 'updateStatus'])->name('updateStatusDA');

    //Route dataInven
    Route::get('/datainven', [DataInvenController::class, 'view'])->name('datainven');
    Route::post('/datainven/tambah', [DataInvenController::class, 'tambah'])->name('tambahDI');
    Route::put('/datainven/update/{id}', [DataInvenController::class, 'update'])->name('updateDI');
    Route::delete('/datainven/hapus/{id}', [DataInvenController::class, 'hapus'])->name('hapusDI');

    // Route dataUtama
    Route::get('/datautama', [dataUtamaController::class, 'view'])->name('datautama');
});


