<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Santri\DashboardController;
use App\Http\Controllers\Santri\DataDiriController;
use App\Http\Controllers\Santri\MataPelajaranController;
use App\Http\Controllers\Santri\NilaiController;
use App\Http\Controllers\Santri\RiwayatNilaiController;
use App\Http\Controllers\Santri\SantriController;
use App\Http\Controllers\Santri\UstadzController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/data-diri', [DataDiriController::class, 'index'])->name('data-diri');
    Route::get('/mata-pelajaran', [MataPelajaranController::class, 'index'])->name('mata-pelajaran');
    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai');
    Route::get('/riwayat-nilai', [RiwayatNilaiController::class, 'index'])->name('riwayat-nilai');
    Route::get('/ustadz', [UstadzController::class, 'index'])->name('ustadz');
    Route::get('/santri', [SantriController::class, 'index'])->name('santri');
});