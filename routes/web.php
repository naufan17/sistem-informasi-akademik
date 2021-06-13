<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('santri.dashboard');
    }); 
    Route::get('/data-diri', function () {
        return view('santri.data-diri');
    });    
    Route::get('/mata-pelajaran', function () {
        return view('santri.mata-pelajaran');
    }); 
    Route::get('/nilai', function () {
        return view('santri.nilai');
    }); 
    Route::get('/riwayat-nilai', function () {
        return view('santri.riwayat-nilai');
    }); 
    Route::get('/ustadz', function () {
        return view('santri.ustadz');
    }); 
    Route::get('/santri', function () {
        return view('santri.santri');
    });
});