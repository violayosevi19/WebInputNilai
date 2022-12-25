<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\DaftarPelajaranSiswaController;


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
//     return view('layout.card');
// });


Route::get('/login',[LoginController::class,'indexlogin'])->name('login');
Route::post('/login',[LoginController::class,'loginAction']);
Route::get('/logout',[LoginController::class,'logout']);

// data siswa
// Route::resource('/siswa',SiswaController::class);
// route semua role user
Route::group(['middleware' => ['auth','cekUserRole:admin,guru,siswa']], function(){
    Route::get('/', function () {
        return view('layout.card');
    })->Middleware('auth'); 
});

// route role user
Route::group(['middleware' => ['auth','cekUserRole:admin']], function(){
    // Route::get('/siswa',[SiswaController::class,'index']);
    // Route::post('/siswa/create',[SiswaController::class,'create']);
    Route::resource('/siswa',SiswaController::class);
    Route::resource('/guru',GuruController::class);
    // Route::get('/guru',[GuruController::class,'index']);
    // Route::post('/guru/create',[GuruController::class,'create']);
    Route::get('/kelas-satu',[KelasController::class,'kelasSatu']);
    Route::get('/kelas-dua',[KelasController::class,'kelasDua']);
    Route::get('/kelas-tiga',[KelasController::class,'kelasTiga']);
    Route::get('/siswa/{id}/profile',[DaftarPelajaranSiswaController::class,'profile']);
    Route::post('/siswa/{id}/addnilai',[DaftarPelajaranSiswaController::class,'addNilai']);
    
});

// route user siswa
Route::group(['middleware' => ['auth','cekUserRole:siswa']], function(){
    Route::get('/siswa',[SiswaController::class,'index']);
    Route::get('/siswa/{id}/profile',[DaftarPelajaranSiswaController::class,'profile']);
});

// route user guru
Route::group(['middleware' => ['auth','cekUserRole:guru']], function(){
    Route::get('/guru',[GuruController::class,'index']);  
    Route::get('/siswa/{id}/profile',[DaftarPelajaranSiswaController::class,'profile']);
    Route::post('/siswa/{id}/addnilai',[DaftarPelajaranSiswaController::class,'addNilai']);
});






