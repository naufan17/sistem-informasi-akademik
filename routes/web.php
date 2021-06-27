<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Santri\DashboardSantriController;
use App\Http\Controllers\Santri\DataDiriController;
use App\Http\Controllers\Santri\KelasSantriController;
use App\Http\Controllers\Santri\NilaiController;
use App\Http\Controllers\Santri\RiwayatNilaiController;
use App\Http\Controllers\Santri\UstadzController;
use App\Http\Controllers\Ustadz\DashboardUstadzController;
use App\Http\Controllers\Ustadz\InputNilaiController;
use App\Http\Controllers\Ustadz\SantriController;
use App\Http\Controllers\Ustadz\KelasUstadzController;

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
    Route::get('/santri/kelas/{name}', [KelasSantriController::class, 'index'])->name('santri.kelas');
    Route::get('/santri/nilai', [NilaiController::class, 'index'])->name('santri.nilai');
    Route::get('/santri/riwayat-nilai', [RiwayatNilaiController::class, 'index'])->name('santri.riwayat-nilai');
    Route::get('/santri/ustadz', [UstadzController::class, 'index'])->name('santri.ustadz');
});

Route::group(['middleware' => 'checkRole:ustadz'], function () {
    Route::get('/ustadz/dashboard', [DashboardUstadzController::class, 'index'])->name('ustadz.dashboard');
    Route::get('/ustadz/input-nilai', [InputNilaiController::class, 'index'])->name('ustadz.input-nilai');
    Route::get('/ustadz/kelas/{name}', [KelasUstadzController::class, 'index'])->name('ustadz.kelas');
    Route::get('/ustadz/santri', [SantriController::class, 'index'])->name('ustadz.santri');
});