<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UjianPesertaController;
use App\Http\Controllers\UjianAdminController;
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

Route::get('/dashboardAdmin', function () {
    return view('admin.dashboard');
})->name('dashboardAdmin');

//jika keadaan mengerjakan
Route::group(['middleware' => ['ujian']], function () {
    Route::resource('pengerjaan', UjianPesertaController::class);
    Route::get('/dashboardPeserta', function () {return view('peserta.dashboard');})->name('dashboardPeserta');    
    Route::get('/profilPeserta', function () {return view('peserta.profilPeserta');})->name('profilPeserta');  
});
Route::resource('answer', AnswerExamController::class);
Route::get('/kerjakanUjian/{id}', [App\Http\Controllers\UjianPesertaController::class, 'kerjakanUjian'])->name('pengerjaan.kerjakanUjian');
Route::get('/selesaikanUjian/{id}', [App\Http\Controllers\UjianPesertaController::class, 'selesaikanUjian'])->name('pengerjaan.selesaikanUjian');
//end jika keadaan mengerjakan

Route::get('/endpoint_data_peserta/{id}', [App\Http\Controllers\UjianPesertaController::class, 'endpoint_data_peserta'])->name('endpoint_data_peserta');
Route::get('/endpoint_question/{id}', [App\Http\Controllers\QuestionController::class, 'show_question'])->name('endpoint_question');

Route::resource('question-admin', QuestionController::class);
Route::resource('hasil-ujian', HasilUjianController::class);
Route::resource('ujianAdmin', UjianAdminController::class);
Route::resource('user', UserController::class);
Route::post('ujianAdmin/storeToken', [UjianAdminController::class, 'storeToken'])->name('ujianAdmin.storeToken');
Route::put('updateJadwal/{id}', [UjianAdminController::class, 'updateJadwal'])->name('updateJadwal');

Auth::routes();
Route::post('/login_peserta', [App\Http\Controllers\Auth\LoginController::class, 'login_peserta'])->name('login_peserta');
Route::get('/login_admin', function () {
    return view('auth.admin.adminLogin');
})->name('login_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

