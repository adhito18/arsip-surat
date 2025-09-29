<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriSuratController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/arsip');
});

Route::get('/about', function(){
    return view('about');
});

Route::controller(ArsipController::class)->group(function() {
    Route::get('/arsip', 'index')->name('arsip.index');
    Route::get('/arsip/lihat/{id}', 'lihat')->name('arsip.lihat');
    Route::get('/arsip/tambah', 'create')->name('arsip.create');
    Route::post('/arsip/store', 'store')->name('arsip.store');
    Route::delete('/arsip/destroy/{id}', 'destroy')->name('arsip.destroy');
    Route::get('/arsip/edit/{id}', 'edit')->name('arsip.edit');
    Route::put('/arsip/update/{id}', 'update')->name('arsip.update');
});

Route::controller(KategoriSuratController::class)->group(function() {
    Route::get('/kategori-surat', 'index')->name('kategori.surat.index');
    Route::get('/kategori-surat/tambah', 'create')->name('kategori.surat.create');
    Route::post('/kategori-surat/store', 'store')->name('kategori.surat.store');
    Route::delete('/kategori-surat/destroy/{id}', 'destroy')->name('kategori.surat.destroy');
    Route::get('/kategori-surat/edit/{id}', 'edit')->name('kategori.surat.edit');
    Route::put('/kategori-surat/update/{id}', 'update')->name('kategori.surat.update');
});