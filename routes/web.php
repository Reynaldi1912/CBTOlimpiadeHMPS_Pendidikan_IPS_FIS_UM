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
    return view('/auth/admin/adminLogin');
});

Route::post('/adminDashboard', function () {
    return view('admin/admin');
});
// end page section



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
