<?php

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

Route::get('/', function () {
    return view('awalpage');
});
Route::get('/caripenduduk','App\Http\Controllers\HalamanAwalController@caridataPenduduk');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');


Route::get('/view-penduduk','App\Http\Controllers\PendudukController@viewPenduduk')->middleware(['auth'])->name('view-penduduk');
Route::get('/add-penduduk','App\Http\Controllers\PendudukController@addPenduduk');
Route::post('/add-penduduk','App\Http\Controllers\PendudukController@tambahPenduduk')->name('add-penduduk');
Route::get('/edit-penduduk/{idPenduduk}','App\Http\Controllers\PendudukController@ubahPenduduk');
Route::post('/edit-penduduk/{idPenduduk}','App\Http\Controllers\PendudukController@editPenduduk')->name('edit-penduduk');
Route::get('/delete-penduduk/{idPenduduk}','App\Http\Controllers\PendudukController@deletePenduduk');
Route::get('/search-penduduk','App\Http\Controllers\PendudukController@searchPenduduk');
Route::get('/export-penduduk','App\Http\Controllers\PendudukController@exportPenduduk');
Route::post('/import-penduduk','App\Http\Controllers\PendudukController@importPenduduk');


Route::get('/view-keluarga','App\Http\Controllers\KeluargaController@viewKeluarga');
Route::get('/add-keluarga','App\Http\Controllers\KeluargaController@addKeluarga');
Route::post('/add-keluarga','App\Http\Controllers\KeluargaController@tambahKeluarga')->name('add-keluarga');
Route::get('/edit-keluarga/{idKeluarga}','App\Http\Controllers\KeluargaController@ubahKeluarga');
Route::post('/edit-keluarga/{idKeluarga}','App\Http\Controllers\KeluargaController@editKeluarga')->name('edit-keluarga');
Route::get('/delete-keluarga/{idKeluarga}','App\Http\Controllers\KeluargaController@deleteKeluarga');
Route::get('/search-keluarga','App\Http\Controllers\KeluargaController@searchKeluarga');

Route::get('/view-kelahiran','App\Http\Controllers\KelahiranController@viewKelahiran');
Route::get('/add-kelahiran','App\Http\Controllers\KelahiranController@addKelahiran');
Route::post('/add-kelahiran','App\Http\Controllers\KelahiranController@tambahKelahiran')->name('add-kelahiran');
Route::get('/edit-kelahiran/{idLahir}','App\Http\Controllers\KelahiranController@ubahKelahiran');
Route::post('/edit-kelahiran/{idLahir}','App\Http\Controllers\KelahiranController@editKelahiran')->name('edit-kelahiran');
Route::get('/delete-kelahiran/{idLahir}','App\Http\Controllers\KelahiranController@deleteKelahiran');
Route::get('/search-kelahiran','App\Http\Controllers\KelahiranController@searchKelahiran');

Route::get('/view-kematian','App\Http\Controllers\KematianController@viewKematian');
Route::get('/add-kematian','App\Http\Controllers\KematianController@addKematian');
Route::post('/add-kematian','App\Http\Controllers\KematianController@tambahKematian')->name('add-kematian');
Route::get('/edit-kematian/{idKematian}','App\Http\Controllers\KematianController@ubahKematian');
Route::post('/edit-kematian/{idKematian}','App\Http\Controllers\KematianController@editKematian')->name('edit-kematian');
Route::get('/delete-kematian/{idKematian}','App\Http\Controllers\KematianController@deleteKematian');
Route::get('/search-kematian','App\Http\Controllers\KematianController@searchKematian');

Route::get('/view-pindah','App\Http\Controllers\PindahController@viewPindah');
Route::get('/add-pindah','App\Http\Controllers\PindahController@addPindah');
Route::post('/add-pindah','App\Http\Controllers\PindahController@tambahPindah')->name('add-pindah');
Route::get('/edit-pindah/{idPindah}','App\Http\Controllers\PindahController@ubahPindah');
Route::post('/edit-pindah/{idPindah}','App\Http\Controllers\PindahController@editPindah')->name('edit-pindah');
Route::get('/delete-pindah/{idPindah}','App\Http\Controllers\PindahController@deletePindah');
Route::get('/search-pindah','App\Http\Controllers\PindahController@searchPindah');

Route::get('/view-pendatang','App\Http\Controllers\PendatangController@viewPendatang');
Route::get('/add-pendatang','App\Http\Controllers\PendatangController@addPendatang');
Route::post('/add-pendatang','App\Http\Controllers\PendatangController@tambahPendatang')->name('add-pendatang');
Route::get('/edit-pendatang/{idPendatang}','App\Http\Controllers\PendatangController@ubahPendatang');
Route::post('/edit-pendatang/{idPendatang}','App\Http\Controllers\PendatangController@editPendatang')->name('edit-pendatang');
Route::get('/delete-pendatang/{idPendatang}','App\Http\Controllers\PendatangController@deletePendatang');
Route::get('/search-pendatang','App\Http\Controllers\PendatangController@searchPendatang');

Route::get('/laporan','App\Http\Controllers\LaporanController@index');
Route::get('/laporan/cetak_pdf','App\Http\Controllers\LaporanController@cetak_pdf');
Route::get('/tabelLaporan','App\Http\Controllers\LaporanController@tabelLaporan');


Route::get('/view-user','App\Http\Controllers\UserController@viewUser')->middleware(['auth'])->name('view-user');
Route::get('/add-user','App\Http\Controllers\UserController@addUser');
Route::post('/add-user','App\Http\Controllers\UserController@tambahUser')->name('add-user');
Route::get('/edit-user/{id}','App\Http\Controllers\UserController@ubahUser');
Route::post('/edit-user/{id}','App\Http\Controllers\UserController@editUser')->name('edit-user');


Route::get('/laporan2', function () {
        return view('laporanpilihbulan');
    });