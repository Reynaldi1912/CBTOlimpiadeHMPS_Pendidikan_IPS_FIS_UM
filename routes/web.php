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

// page section
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login_admin', function () {
    return view('auth.admin.adminLogin');
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
// end page section



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
