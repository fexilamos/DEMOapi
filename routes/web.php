<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

require __DIR__.'/auth.php';
