<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\BukuController;

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


Route::get('/',[DashboardController::class,"index"])->name("dashboard");


Route::get('/kategori',[KategoriBukuController::class,"index"])->name("kategoriBuku");
Route::post('/kategori/store',[KategoriBukuController::class,"store"])->name("kategoriStore");
Route::get('/kategori/edit/{id}',[KategoriBukuController::class,"edit"])->name("getKategori");
Route::post('/kategori/update/{id}', [KategoriBukuController::class, "update"])->name("updateKategori");
Route::get('/kategori/destroy/{id}', [KategoriBukuController::class, "destroy"])->name("destroyKategori");

Route::get('/buku',[BukuController::class,"index"])->name("buku");
Route::post('/buku/store',[BukuController::class,"store"])->name("bukuStore");
Route::get('/buku/edit/{id}',[BukuController::class,"edit"])->name("getBuku");
Route::post('/buku/update/{id}', [BukuController::class, "update"])->name("updateBuku");
Route::get('/buku/destroy/{id}', [BukuController::class, "destroy"])->name("destroyKategori");