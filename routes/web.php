<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Santri\DashboardSantriController;
use App\Http\Controllers\Santri\DataDiriController;
use App\Http\Controllers\Santri\MataPelajaranController;
use App\Http\Controllers\Santri\NilaiController;
use App\Http\Controllers\Santri\RiwayatNilaiController;
use App\Http\Controllers\Santri\SantriController;
use App\Http\Controllers\Santri\UstadzController;
use App\Http\Controllers\Ustadz\DashboardUstadzController;

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
    Route::get('/santri/dashboard', [DashboardSantriController::class, 'index'])->name('santri.dashboard');
    Route::get('/santri/data-diri', [DataDiriController::class, 'index'])->name('santri.data-diri');
    Route::get('/santri/update-data-diri', [DataDiriController::class, 'formUpdate'])->name('santri.update-data-diri');   
    Route::get('/santri/mata-pelajaran', [MataPelajaranController::class, 'index'])->name('santri.mata-pelajaran');
    Route::get('/santri/nilai', [NilaiController::class, 'index'])->name('santri.nilai');
    Route::get('/santri/riwayat-nilai', [RiwayatNilaiController::class, 'index'])->name('santri.riwayat-nilai');
    Route::get('/santri/ustadz', [UstadzController::class, 'index'])->name('santri.ustadz');
    Route::get('/santri', [SantriController::class, 'index'])->name('santri');
});

Route::group(['middleware' => 'checkRole:ustadz'], function () {
    Route::get('/ustadz/dashboard', [DashboardUstadzController::class, 'index'])->name('ustadz.dashboard');
});