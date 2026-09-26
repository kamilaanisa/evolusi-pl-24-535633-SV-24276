<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tugas', TugasController::class)
    ->parameters(['tugas' => 'tugas'])
    ->except(['show', 'edit']);

    // bukti pipeline: production harus skip di branch fitur