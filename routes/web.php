<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PayPalController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/bandeira/{codigo?}', function ($codigo = null) {
    return view('bandeira.bandeira', [
        'codigo' => $codigo ? strtoupper($codigo) : null
    ]);
})->where('codigo', '[A-Za-z]{2}')->name('bandeira');

Route::get('/form-bandeira', function () {
    return view('bandeira.form-bandeira');
})->name('form-bandeira');

Route::post('/form-bandeira', function (Request $request) {
   return view('bandeira.form-bandeira', [
        'codigo' => strtoupper($request->input('pais')),

    ]);
});

Route::get('transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::get('finish-transaction', [PayPalController::class, 'finishTransaction'])->name('finishTransaction');




require __DIR__.'/auth.php';
