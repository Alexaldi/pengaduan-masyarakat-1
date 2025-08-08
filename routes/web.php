<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MasyarakatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin/Petugas
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('pengaduans', 'PengaduanController');

        Route::resource('tanggapan', 'TanggapanController');

        Route::get('/admin/masyarakat', [MasyarakatController::class, 'index'])->name('admin.masyarakat');

        Route::get('masyarakat', [MasyarakatController::class, 'index'])->name('admin.masyarakat');
        Route::get('/masyarakat/create', [MasyarakatController::class, 'createMasyarakat'])->name('masyarakat.create');
        Route::post('/masyarakat', [MasyarakatController::class, 'storeMasyarakat'])->name('masyarakat.store');
        
        Route::get('/masyarakat/{id}/edit', [MasyarakatController::class, 'editMasyarakat'])->name('masyarakat.edit');
        Route::put('/masyarakat/{id}', [MasyarakatController::class, 'updateMasyarakat'])->name('masyarakat.update');
        Route::delete('/masyarakat/{id}', [MasyarakatController::class, 'destroyMasyarakat'])->name('masyarakat.destroy');
        Route::get('/admin/masyarakat/cari', [MasyarakatController::class, 'cariMasyarakat'])->name('admin.masyarakat.cari');

        Route::resource('petugas', 'PetugasController');

        Route::get('laporan', 'AdminController@laporan');
        Route::get('laporan/cetak', 'AdminController@cetak');
        Route::get('pengaduan/cetak/{id}', 'AdminController@pdf');

        Route::post('/chat/send-to-petugas/{petugasId}', [ChatController::class, 'sendMessageToPetugas']);
});


// Masyarakat
Route::prefix('user')
    ->middleware(['auth', 'MasyarakatMiddleware'])
    ->group(function() {
		Route::get('/', 'MasyarakatController@index')->name('masyarakat-dashboard');
        Route::resource('pengaduan', 'MasyarakatController');
        Route::get('pengaduan', 'MasyarakatController@lihat');

        Route::post('/chat/send-to-user/{userId}', [ChatController::class, 'sendMessageToUser']);
});

Route::get('/chat', [ChatController::class, 'index']);
Route::get('/chat/history/{userId}/{petugasId}', [ChatController::class, 'getChatHistory']);

require __DIR__.'/auth.php';
