<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'proses_login']);
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'proses_login'])->name('login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'proses_register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard.view')->middleware('userAkses:admin');
    Route::get('/home', [UserController::class, 'home'])->name('home.view')->middleware('userAkses:user');
    Route::get('/mata-kuliah', [UserController::class, 'matkul'])->middleware('userAkses:user');
    Route::get('/jadwal-kuliah', [UserController::class, 'jadwal'])->middleware('userAkses:user');
    Route::get('/home/completed/{id}', [UserController::class, 'create_completed_task'])->middleware('userAkses:user');


    // Tugas
    Route::get('/daftartugas',[ AdminController::class, 'tugas'])->name('tugas.view')->middleware('userAkses:admin');
    Route::get('/daftartugas/tambah',[ AdminController::class, 'tambah_tugas'])->name('tambahtugas.view')->middleware('userAkses:admin');
    Route::post('/daftartugas/tambah',[ AdminController::class, 'create_tugas'])->middleware('userAkses:admin');
    Route::get('/daftartugas/delete/{item}',[ AdminController::class, 'delete_tugas'])->middleware('userAkses:admin');
    Route::get('/daftartugas/edit/{item}',[ AdminController::class, 'edit_tugas'])->middleware('userAkses:admin');
    Route::post('/daftartugas/edit/{item}',[ AdminController::class, 'update_tugas'])->middleware('userAkses:admin');



    // Matakuliah
    Route::get('/matakuliah', [AdminController::class, 'matkul'])->name('matkul.view')->middleware('userAkses:admin');
    Route::get('/matakuliah/editmatkul/{item}', [AdminController::class, 'edit_matkul'])->middleware('userAkses:admin');
    Route::post('/matakuliah/editmatkul/{item}', [AdminController::class, 'update_matkul'])->middleware('userAkses:admin');
    Route::get('/matakuliah/tambahmatkul', [AdminController::class, 'tambahmatkul'])->name('tambahmatkul.view')->middleware('userAkses:admin');
    Route::post('/matakuliah/tambahmatkul', [AdminController::class, 'create_matkul'])->middleware('userAkses:admin');
    Route::get('/matakuliah/delete/{item}', [AdminController::class, 'delete_matkul'])->middleware('userAkses:admin');
    // ----------------------
    
    
    //Jadwal Kuliah
    Route::get('/jadwalkuliah', [AdminController::class, 'jadwal'])->middleware('userAkses:admin');
    Route::get('/jadwalkuliah/tambah', [AdminController::class, 'tambah_jadwal'])->middleware('userAkses:admin');
    Route::post('/jadwalkuliah/tambah', [AdminController::class, 'create_jadwal'])->middleware('userAkses:admin');
    Route::get('/jadwalkuliah/edit/{item}', [AdminController::class, 'edit_jadwal'])->middleware('userAkses:admin');
    Route::post('/jadwalkuliah/edit/{item}', [AdminController::class, 'update_jadwal'])->middleware('userAkses:admin');
    Route::get('/jadwalkuliah/delete/{item}', [AdminController::class, 'delete_jadwal'])->middleware('userAkses:admin');
    
    
    // informasi
    Route::get('/informasi', [AdminController::class, 'info'])->middleware('userAkses:admin');;
    Route::get('/informasi/tambahinfo', [AdminController::class, 'tambah_info'])->middleware('userAkses:admin');;
    Route::post('/informasi/tambahinfo', [AdminController::class, 'create_info'])->middleware('userAkses:admin');;
    Route::get('/informasi/edit/{item}', [AdminController::class, 'edit_info'])->middleware('userAkses:admin');;
    Route::post('/informasi/edit/{item}', [AdminController::class, 'update_info'])->middleware('userAkses:admin');;
    Route::get('/informasi/delete/{item}', [AdminController::class, 'delete_info'])->middleware('userAkses:admin');;





});
Route::get('/masuk', [AuthController::class, 'CheckRole']);
// Route::get('/home', function () {
//     return redirect('dashboard');
// });