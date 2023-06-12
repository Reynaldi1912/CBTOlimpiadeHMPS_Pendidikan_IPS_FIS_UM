<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UjianPesertaController;
use App\Http\Controllers\UjianAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnswerExamController;
use App\Http\Controllers\HasilUjianController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;

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

//jika keadaan mengerjakan

Route::middleware(['auth', 'role:peserta'])->group(function () {
    Route::resource('answer', AnswerExamController::class);
    Route::get('/kerjakanUjian/{id}', [UjianPesertaController::class, 'kerjakanUjian'])->name('pengerjaan.kerjakanUjian');
    Route::get('/selesaikanUjian/{id}', [UjianPesertaController::class, 'selesaikanUjian'])->name('pengerjaan.selesaikanUjian');
    //end jika keadaan mengerjakan
    Route::group(['middleware' => ['ujian']], function () {
        Route::resource('pengerjaan', UjianPesertaController::class);
        Route::get('/profilPeserta', function () {return view('peserta.profilPeserta');})->name('profilPeserta');  
    });
    Route::get('/dashboard-user', [HomeController::class, 'dashboardUser'])->name('dashboard_user');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard-admin', [HomeController::class, 'dashboardAdmin'])->name('dashboard_admin');
    Route::get('/endpoint_data_peserta/{id}', [UjianPesertaController::class, 'endpoint_data_peserta'])->name('endpoint_data_peserta');
    Route::get('/endpoint_question/{id}', [QuestionController::class, 'show_question'])->name('endpoint_question');
    Route::get('/endpoint_user/{id}', [UserController::class, 'getUser'])->name('endpoint_user');

    Route::resource('question-admin', QuestionController::class);
    Route::resource('hasil-ujian', HasilUjianController::class);
    Route::resource('ujianAdmin', UjianAdminController::class);
    Route::resource('user', UserController::class);

    Route::post('input_semua_nilai', [UjianAdminController::class, 'input_semua_nilai'])->name('ujianAdmin.input_semua_nilai');
    Route::post('input_nilai_akhir', [UjianAdminController::class, 'input_nilai_akhir'])->name('ujianAdmin.input_nilai_akhir');

    Route::post('update-lolos/{id}', [HasilUjianController::class, 'update_lolos'])->name('ujianAdmin.update_lolos');
    Route::post('tambah-peserta-ujian/{id}', [UjianAdminController::class, 'tambahPeserta'])->name('ujianAdmin.tambahPeserta');
    Route::post('ujianAdmin/storeToken', [UjianAdminController::class, 'storeToken'])->name('ujianAdmin.storeToken');
    Route::put('updateJadwal/{id}', [UjianAdminController::class, 'updateJadwal'])->name('updateJadwal');
    Route::post('update-pengumuman/{id}', [HomeController::class, 'updatePengumuman'])->name('update-pengumuman');
});

Auth::routes();
Route::post('/login_peserta', [App\Http\Controllers\Auth\LoginController::class, 'login_peserta'])->name('login_peserta');
Route::get('/login_admin', function () {
    return view('auth.admin.adminLogin');
})->name('login_admin');

Route::get('/home', [HomeController::class, 'index'])->name('home');

