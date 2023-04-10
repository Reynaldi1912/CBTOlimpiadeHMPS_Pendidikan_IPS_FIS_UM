<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UjianPesertaController;

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

// page section
Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('dashboardAdmin', [AuthController::class, 'dashboardAdmin'])->name('dashboardAdmin');
// Route::get('/adminMaster', function () {
//     return view('layout/master');
// });

Route::get('/dashboardAdmin', function () {
    return view('admin.dashboard');
})->name('dashboardAdmin');

Route::get('/hasilUjian', function () {
    return view('admin.hasilUjian');
})->name('hasilUjian');

Route::get('/kelolaAdmin', function () {
    return view('admin.kelolaAdmin');
})->name('kelolaAdmin');

Route::get('/kelolaPeserta', function () {
    return view('admin.kelolaPeserta');
})->name('kelolaPeserta');

Route::get('/dashboardPeserta', function () {
    return view('peserta.dashboard');
})->name('dashboardPeserta');

Route::get('/dashboardPeserta', function () {
    return view('peserta.dashboard');
})->name('dashboardPeserta');

// Route::get('/ujianPeserta', function () {
//     return view('peserta.ujianPeserta');
// })->name('ujianPeserta');

Route::get('/pengerjaanSoal', function () {
    return view('peserta.pengerjaanSoal');
})->name('pengerjaanSoal');

Route::get('/profilPeserta', function () {
    return view('peserta.profilPeserta');
})->name('profilPeserta');
// end page section
// Route::get('/pengerjaan', function () {
//     return view('peserta.pengerjaanSoal');
// })->name('pengerjaan');

Route::resource('pengerjaan', UjianPesertaController::class);


Auth::routes();
Route::post('/login_peserta', [App\Http\Controllers\Auth\LoginController::class, 'login_peserta'])->name('login_peserta');
Route::get('/login_admin', function () {
    return view('auth.admin.adminLogin');
})->name('login_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

