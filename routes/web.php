<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\HomeController;
use App\Models\Karyawan;
use App\Models\Cuti;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/tabel-cuti', [CutiController::class, 'index']);
    Route::controller(KaryawanController::class)->group(function () {
        Route::get('/tabel-karyawan', 'index');
        Route::post('/tambah-karyawan', 'create');
        Route::post('/ubah-karyawan/{id}', 'update');
        Route::post('/hapus-karyawan/{id}', 'delete');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Auth::routes();
