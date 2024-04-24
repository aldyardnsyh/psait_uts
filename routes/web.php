<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', NilaiController::class)->except(['show', 'store', 'update', 'destroy']);
Route::get('/mahasiswa/{nim}/{kode_mk}', [NilaiController::class, 'show'])->name('mahasiswa.show');
Route::post('/mahasiswa', [NilaiController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{nim}/{kode_mk}', [NilaiController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{nim}/{kode_mk}', [NilaiController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{nim}/{kode_mk}', [NilaiController::class, 'destroy'])->name('mahasiswa.destroy');


