<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\controllerAddMhs;
use App\Http\Controllers\controllerMhs;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('landing1');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/verifikasi', function () {
    return view('verifikasi');
})->middleware(['auth', 'verified'])->name('verifikasi');

//tambah mhs
/* Route::get('/insertmahasiswa', function () {
    return view('tambahmhs');
})->middleware(['auth', 'verified'])->name('tambahmhs'); */
/* Route::get('insertmhs/tampil', [controllerAddMhs::class, 'tampilmhs'])->name('tambahmhs')->middleware('auth'); */
Route::get('insertmhs/tambah', [controllerAddMhs::class, 'tambahmhs'])->name('tambahmhs')->middleware('auth');
Route::post('insertmhs/simpan', [controllerAddMhs::class, 'simpanmhs'])->name('simpanmhs')->middleware('auth');

//lihat mhs
Route::get('verifikasi', [controllerMhs::class, 'index'])->name('verifikasi')->middleware('auth');
Route::get('verifikasiSetuju', [controllerMhs::class, 'indexvalid'])->name('verifikasiSetuju')->middleware('auth');
Route::get('verifikasiDitolak', [controllerMhs::class, 'indextolak'])->name('verifikasiDitolak')->middleware('auth');
Route::get('verifikasi/{id_mhs}/cek', [controllerMhs::class, 'cek'])->name('verifikasi/{$id_mhs}/cek')->middleware('auth');
Route::post('verifikasi/{id_mhs}/update', [controllerMhs::class, 'update'])->name('update')->middleware('auth');
/* Route::get('verifikasi/{id}/edit', 'KaryawanController@edit'); */

Route::view('/verif', 'VerifikasiBB')->name('verif');
Route::view('/home', 'home')->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
