<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TugasController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tugas', TugasController::class)->except(['show', 'edit']);