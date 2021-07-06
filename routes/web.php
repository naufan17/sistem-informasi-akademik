<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Santri\DashboardSantriController;
use App\Http\Controllers\Santri\DataDiriSantriController;
use App\Http\Controllers\Santri\KelasSantriController;
use App\Http\Controllers\Santri\NilaiSantriController;
use App\Http\Controllers\Santri\RiwayatNilaiSantriController;
use App\Http\Controllers\Santri\NilaiKumulatifSantriController;
use App\Http\Controllers\Santri\SantriSantriController;
use App\Http\Controllers\Santri\UstadzSantriController;

use App\Http\Controllers\Ustadz\DashboardUstadzController;
use App\Http\Controllers\Ustadz\DataDiriUstadzController;
use App\Http\Controllers\Ustadz\MataPelajaranUstadzController;
use App\Http\Controllers\Ustadz\SantriUstadzController;
use App\Http\Controllers\Ustadz\UstadzUstadzController;

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
    
    Route::get('/santri/data-diri/{id}', [DataDiriSantriController::class, 'index'])->name('santri.data-diri');
    Route::get('/santri/data-diri/form-update/{id}', [DataDiriSantriController::class, 'formUpdate'])->name('santri.data-diri.form-update');
    Route::get('/santri/data-diri/update-profile', [DataDiriSantriController::class, 'updateProfile'])->name('santri.data-diri.update-profile');
    Route::get('/santri/data-diri/update-password', [DataDiriSantriController::class, 'updatePassword'])->name('santri.data-diri.update-password');

    Route::get('/santri/kelas/{id}', [KelasSantriController::class, 'index'])->name('santri.kelas');
    Route::get('/santri/kelas/detail/{id}', [KelasSantriController::class, 'detail'])->name('santri.kelas.detail');

    Route::get('/santri/nilai/{id}', [NilaiSantriController::class, 'index'])->name('santri.nilai');
    Route::get('/santri/riwayat-nilai/{id}', [RiwayatNilaiSantriController::class, 'index'])->name('santri.riwayat-nilai');
    Route::get('/santri/nilai-kumulatif/{id}', [NilaiKumulatifSantriController::class, 'index'])->name('santri.nilai-kumulatif');
    
    Route::get('/santri/filter-ustadz', [UstadzSantriController::class, 'filter'])->name('santri.filter-ustadz');
    Route::get('/santri/ustadz', [UstadzSantriController::class, 'index'])->name('santri.ustadz');

    Route::get('/santri/filter-santri', [SantriSantriController::class, 'filter'])->name('santri.filter-santri');
    Route::get('/santri/santri', [SantriSantriController::class, 'index'])->name('santri.santri');
});

Route::group(['middleware' => 'checkRole:ustadz'], function () {
    Route::get('/ustadz/dashboard', [DashboardUstadzController::class, 'index'])->name('ustadz.dashboard');
    
    Route::get('/ustadz/data-diri/{id}', [DataDiriUstadzController::class, 'index'])->name('ustadz.data-diri');
    Route::get('/ustadz/data-diri/form-update/{id}', [DataDiriUstadzController::class, 'formUpdate'])->name('ustadz.data-diri.form-update');
    Route::get('/ustadz/data-diri/update-profile', [DataDiriUstadzController::class, 'updateProfile'])->name('ustadz.data-diri.update-profile');
    Route::get('/ustadz/data-diri/update-password', [DataDiriUstadzController::class, 'updatePassword'])->name('ustadz.data-diri.update-password');

    Route::get('/ustadz/mata-pelajaran/{id}', [MataPelajaranUstadzController::class, 'index'])->name('ustadz.mata-pelajaran');
    Route::get('/ustadz/mata-pelajaran/detail-santri/{id}', [MataPelajaranUstadzController::class, 'detailSantri'])->name('ustadz.mata-pelajaran.detail-santri');

    Route::get('/ustadz/filter-santri', [SantriUstadzController::class, 'filter'])->name('ustadz.filter-santri');
    Route::get('/ustadz/santri', [SantriUstadzController::class, 'index'])->name('ustadz.santri');

    Route::get('/ustadz/filter-ustadz', [UstadzUstadzController::class, 'filter'])->name('ustadz.filter-ustadz');
    Route::get('/ustadz/ustadz', [UstadzUstadzController::class, 'index'])->name('ustadz.ustadz');
});