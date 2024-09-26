<?php

use Illuminate\Support\Facades\Route;
use App\Models\Antrian;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AntrianController;

Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index');
Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
Route::patch('/antrian/{id}/process', [AntrianController::class, 'process'])->name('antrian.process');
Route::patch('/antrian/{id}/complete', [AntrianController::class, 'complete'])->name('antrian.complete');

Route::get('/ambiltiket', [AntrianController::class, 'index2'])->name('ambiltiket.index');
Route::post('/ambiltiket', [AntrianController::class, 'store2'])->name('ambiltiket.store');

Route::get('/monitor', function () {
    // Ambil antrian yang sedang diproses
    $antrianDiproses = Antrian::where('status', 'diproses')->first();
    // Hitung jumlah antrian menunggu
    $antrianMenunggu = Antrian::where('status', 'menunggu')->count();
    // Ambil antrian berikutnya (yang menunggu dan urutan terkecil)
    $antrianBerikutnya = Antrian::where('status', 'menunggu')->orderBy('nomor_antrian')->first();

    return view('monitor', compact('antrianDiproses', 'antrianMenunggu', 'antrianBerikutnya'));
})->name('monitor');
