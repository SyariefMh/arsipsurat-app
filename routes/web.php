<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\suratController;
use App\Http\Controllers\tambahSuratController;
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

    Route::get('/arsip', [suratController::class, 'index'])->name('arsip');
    Route::get('/tambahsurat', [tambahSuratController::class, 'index']);
    Route::post('/tambahsurat/upload', [tambahSuratController::class, 'store']);
    Route::delete('/surat/destroy/{id}',[suratController::class, 'destroy'])->name('surat.destroy');
    Route::get('/lihat/{id}',[suratController::class, 'lihat'])->name('lihat');
    Route::get('/edit-surat/{id}', [suratController::class, 'edit'])->name('edit-surat');
    Route::put('/update-surat/{id}',[tambahSuratController::class, 'update'])->name('update-surat');


    Route::get('/kategori',[kategoriController::class, 'index'])->name('kategori');
    Route::get('/tambahKategori',[kategoriController::class, 'tambahKategori']);
    Route::get('/edit/{id}',[kategoriController::class, 'edit'])->name('edit-kategori');
    Route::put('/update/{id}',[kategoriController::class, 'update'])->name('update-kategori');
    Route::get('/tambahKategori', [KategoriController::class, 'create']);
    Route::post('/tambahKategori/newKategori',[kategoriController::class, 'store'])->name('Kategori.store');
    Route::delete('/kategori/destroy/{id}',[kategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/about',function(){
        return view('about');
    });