<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Santri\DashboardSantriController;
use App\Http\Controllers\Santri\DataDiriSantriController;
use App\Http\Controllers\Santri\KelasSantriController;
use App\Http\Controllers\Santri\NilaiSemesterSantriController;
use App\Http\Controllers\Santri\RiwayatNilaiSantriController;
use App\Http\Controllers\Santri\HasilStudiSantriController;
use App\Http\Controllers\Santri\SantriSantriController;
use App\Http\Controllers\Santri\UstadzSantriController;

use App\Http\Controllers\Ustadz\DashboardUstadzController;
use App\Http\Controllers\Ustadz\DataDiriUstadzController;
use App\Http\Controllers\Ustadz\KelasUstadzController;
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

Route::get('/login/santri', [LoginController::class, 'showSantriLoginForm']);
Route::get('/login/ustadz', [LoginController::class, 'showUstadzLoginForm']);

Route::post('/login/santri', [LoginController::class, 'santriLogin']);
Route::post('/login/ustadz', [LoginController::class, 'ustadzLogin']);

// Route::view('/home', 'home')->middleware('auth');

Route::group(['middleware' => 'auth:santri'], function () {
    Route::get('/santri/dashboard', [DashboardSantriController::class, 'index'])->name('santri.dashboard');

    Route::get('/santri/data-diri/{id}', [DataDiriSantriController::class, 'index'])->name('santri.data-diri');
    Route::get('/santri/data-diri/form-update/{id}', [DataDiriSantriController::class, 'formUpdate'])->name('santri.data-diri.form-update');
    Route::post('/santri/data-diri/update-profile', [DataDiriSantriController::class, 'updateProfile'])->name('santri.data-diri.update-profile');
    Route::post('/santri/data-diri/update-password', [DataDiriSantriController::class, 'updatePassword'])->name('santri.data-diri.update-password');

    Route::get('/santri/kelas/{id}', [KelasSantriController::class, 'index'])->name('santri.kelas');
    Route::post('/santri/kelas', [KelasSantriController::class, 'filterKelas'])->name('santri.kelas');
    Route::get('/santri/kelas/form-create/{id}', [KelasSantriController::class, 'formCreate'])->name('santri.kelas.form-create');
    Route::post('/santri/kelas/create', [KelasSantriController::class, 'create'])->name('santri.kelas.create');
    Route::get('/santri/kelas/delete/{id}', [KelasSantriController::class, 'delete'])->name('santri.kelas.delete');
    Route::get('/santri/kelas/detail/{id}', [KelasSantriController::class, 'detail'])->name('santri.kelas.detail');
    Route::post('/santri/kelas/cetak', [KelasSantriController::class, 'cetakKelas'])->name('santri.kelas.cetak');

    Route::get('/santri/nilai-semester/{id}', [NilaiSemesterSantriController::class, 'index'])->name('santri.nilai-semester');
    Route::post('/santri/nilai-semester', [NilaiSemesterSantriController::class, 'filterNilaiSemester'])->name('santri.nilai-semester');
    Route::post('/santri/nilai-semester/cetak', [NilaiSemesterSantriController::class, 'cetakNilaiSemester'])->name('santri.nilai-semester.cetak');

    // Route::get('/santri/riwayat-nilai/{id}', [RiwayatNilaiSantriController::class, 'index'])->name('santri.riwayat-nilai');
    // Route::post('/santri/riwayat-nilai', [RiwayatNilaiSantriController::class, 'filterRiwayatNilai'])->name('santri.riwayat-nilai');
    // Route::post('/santri/riwayat-nilai/cetak', [RiwayatNilaiSantriController::class, 'cetakRiwayatNilai'])->name('santri.riwayat-nilai.cetak');
    
    Route::get('/santri/hasil-studi/{id}', [HasilStudiSantriController::class, 'index'])->name('santri.hasil-studi');
    Route::post('/santri/hasil-studi', [HasilStudiSantriController::class, 'filterHasilStudi'])->name('santri.hasil-studi');
    Route::post('/santri/hasil-studi/cetak', [HasilStudiSantriController::class, 'cetakHasilStudi'])->name('santri.hasil-studi.cetak');
    
    Route::get('/santri/ustadz', [UstadzSantriController::class, 'index'])->name('santri.ustadz');
    Route::post('/santri/ustadz', [UstadzSantriController::class, 'filter'])->name('santri.filter-ustadz');

    Route::get('/santri/santri', [SantriSantriController::class, 'index'])->name('santri.santri');
    Route::post('/santri/santri', [SantriSantriController::class, 'filter'])->name('santri.filter-santri');
});

Route::group(['middleware' => 'auth:ustadz'], function () {
    Route::get('/ustadz/dashboard', [DashboardUstadzController::class, 'index'])->name('ustadz.dashboard');

    Route::get('/ustadz/data-diri/{id}', [DataDiriUstadzController::class, 'index'])->name('ustadz.data-diri');
    Route::get('/ustadz/data-diri/form-update/{id}', [DataDiriUstadzController::class, 'formUpdate'])->name('ustadz.data-diri.form-update');
    Route::post('/ustadz/data-diri/update-profile', [DataDiriUstadzController::class, 'updateProfile'])->name('ustadz.data-diri.update-profile');
    Route::post('/ustadz/data-diri/update-password', [DataDiriUstadzController::class, 'updatePassword'])->name('ustadz.data-diri.update-password');

    Route::get('/ustadz/kelas/{id}', [KelasUstadzController::class, 'index'])->name('ustadz.kelas');
    Route::post('/ustadz/kelas', [KelasUstadzController::class, 'filter'])->name('ustadz.kelas');
    Route::get('/ustadz/kelas/detail-santri/{id}', [KelasUstadzController::class, 'detailSantri'])->name('ustadz.kelas.detail-santri');
    Route::post('/ustadz/kelas/detail-santri/create-nilai', [KelasUstadzController::class, 'createNilai'])->name('ustadz.kelas.detail-santri.create-nilai');
    Route::post('/ustadz/kelas/cetak', [KelasUstadzController::class, 'cetakKelas'])->name('ustadz.kelas.cetak');

    Route::get('/ustadz/santri', [SantriUstadzController::class, 'index'])->name('ustadz.santri');
    Route::post('/ustadz/santri', [SantriUstadzController::class, 'filter'])->name('ustadz.santri');

    Route::get('/ustadz/ustadz', [UstadzUstadzController::class, 'index'])->name('ustadz.ustadz');
    Route::post('/ustadz/ustadz', [UstadzUstadzController::class, 'filter'])->name('ustadz.ustadz');
});

// Route::group(['middleware' => 'auth'], function () {
    // Route::get('/santri/dashboard', [DashboardSantriController::class, 'index'])->name('santri.dashboard');
    
    // Route::get('/santri/data-diri/{id}', [DataDiriSantriController::class, 'index'])->name('santri.data-diri');
    // Route::get('/santri/data-diri/form-update/{id}', [DataDiriSantriController::class, 'formUpdate'])->name('santri.data-diri.form-update');
    // Route::post('/santri/data-diri/update-profile', [DataDiriSantriController::class, 'updateProfile'])->name('santri.data-diri.update-profile');
    // Route::post('/santri/data-diri/update-password', [DataDiriSantriController::class, 'updatePassword'])->name('santri.data-diri.update-password');

    // Route::get('/santri/kelas/{id}', [KelasSantriController::class, 'index'])->name('santri.kelas');
    // Route::post('/santri/kelas', [KelasSantriController::class, 'filterKelas'])->name('santri.kelas');
    // Route::get('/santri/kelas/form-create/{id}', [KelasSantriController::class, 'formCreate'])->name('santri.kelas.form-create');
    // Route::post('/santri/kelas/create', [KelasSantriController::class, 'create'])->name('santri.kelas.create');
    // Route::get('/santri/kelas/delete/{id}', [KelasSantriController::class, 'delete'])->name('santri.kelas.delete');
    // Route::get('/santri/kelas/detail/{id}', [KelasSantriController::class, 'detail'])->name('santri.kelas.detail');
    // Route::post('/santri/kelas/cetak', [KelasSantriController::class, 'cetakKelas'])->name('santri.kelas.cetak');

    // Route::get('/santri/nilai-semester/{id}', [NilaiSemesterSantriController::class, 'index'])->name('santri.nilai-semester');
    // Route::post('/santri/nilai-semester', [NilaiSemesterSantriController::class, 'filterNilaiSemester'])->name('santri.nilai-semester');
    // Route::post('/santri/nilai-semester/cetak', [NilaiSemesterSantriController::class, 'cetakNilaiSemester'])->name('santri.nilai-semester.cetak');

    // Route::get('/santri/riwayat-nilai/{id}', [RiwayatNilaiSantriController::class, 'index'])->name('santri.riwayat-nilai');
    // Route::post('/santri/riwayat-nilai', [RiwayatNilaiSantriController::class, 'filterRiwayatNilai'])->name('santri.riwayat-nilai');
    // Route::post('/santri/riwayat-nilai/cetak', [RiwayatNilaiSantriController::class, 'cetakRiwayatNilai'])->name('santri.riwayat-nilai.cetak');
    
    // Route::get('/santri/hasil-studi/{id}', [HasilStudiSantriController::class, 'index'])->name('santri.hasil-studi');
    // Route::post('/santri/hasil-studi', [HasilStudiSantriController::class, 'filterHasilStudi'])->name('santri.hasil-studi');
    // Route::post('/santri/hasil-studi/cetak', [HasilStudiSantriController::class, 'cetakHasilStudi'])->name('santri.hasil-studi.cetak');
    
    // Route::get('/santri/ustadz', [UstadzSantriController::class, 'index'])->name('santri.ustadz');
    // Route::post('/santri/ustadz', [UstadzSantriController::class, 'filter'])->name('santri.filter-ustadz');

    // Route::get('/santri/santri', [SantriSantriController::class, 'index'])->name('santri.santri');
    // Route::post('/santri/santri', [SantriSantriController::class, 'filter'])->name('santri.filter-santri');
// });

// Route::group(['middleware' => 'checkRole:ustadz'], function () {
    // Route::get('/ustadz/dashboard', [DashboardUstadzController::class, 'index'])->name('ustadz.dashboard');
    
    // Route::get('/ustadz/data-diri/{id}', [DataDiriUstadzController::class, 'index'])->name('ustadz.data-diri');
    // Route::get('/ustadz/data-diri/form-update/{id}', [DataDiriUstadzController::class, 'formUpdate'])->name('ustadz.data-diri.form-update');
    // Route::post('/ustadz/data-diri/update-profile', [DataDiriUstadzController::class, 'updateProfile'])->name('ustadz.data-diri.update-profile');
    // Route::post('/ustadz/data-diri/update-password', [DataDiriUstadzController::class, 'updatePassword'])->name('ustadz.data-diri.update-password');

    // Route::get('/ustadz/kelas/{id}', [KelasUstadzController::class, 'index'])->name('ustadz.kelas');
    // Route::post('/ustadz/kelas', [KelasUstadzController::class, 'filter'])->name('ustadz.kelas');
    // Route::get('/ustadz/kelas/detail-santri/{id}', [KelasUstadzController::class, 'detailSantri'])->name('ustadz.kelas.detail-santri');
    // Route::post('/ustadz/kelas/detail-santri/create-nilai', [KelasUstadzController::class, 'createNilai'])->name('ustadz.kelas.detail-santri.create-nilai');
    // Route::post('/ustadz/kelas/cetak', [KelasUstadzController::class, 'cetakKelas'])->name('ustadz.kelas.cetak');

    // Route::get('/ustadz/santri', [SantriUstadzController::class, 'index'])->name('ustadz.santri');
    // Route::post('/ustadz/santri', [SantriUstadzController::class, 'filter'])->name('ustadz.santri');

    // Route::get('/ustadz/ustadz', [UstadzUstadzController::class, 'index'])->name('ustadz.ustadz');
    // Route::post('/ustadz/ustadz', [UstadzUstadzController::class, 'filter'])->name('ustadz.ustadz');
// });